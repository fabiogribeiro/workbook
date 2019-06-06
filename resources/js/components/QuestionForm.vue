<template>
<div>
  <p>{{ question.title }}</p>

  <form v-on:submit.prevent="checkAnswer" method="POST" action="/api/questions/answer">
    <div
        v-if="isMultipleChoice"
        class="uk-form-controls"
    >
      <div
          v-for="(choice, index) in question.question_data.choices"
          v-bind:key="index">
        <label >
          <input
            class="uk-radio"
            type="radio"
            name="choice"
            v-bind:value="String.fromCharCode(index + 65)"
            v-model="answer"
            required>
          {{ choice }}
        </label><br>
      </div>
      <button class="uk-button uk-button-primary uk-margin-small">Submit</button>
    </div>
    <div v-else>
      <input
        class="uk-input uk-form-width-medium"
        type="text"
        v-model="answer"
        placeholder="Answer"
        required>
      <button class="uk-button uk-button-primary">Submit</button>
    </div>
  </form>
</div>
</template>

<script>
export default {
  data() {
    return {
      action: '/api/questions/answer',
      answer: '',
    }
  },
  props: ['question'],
  computed: {
    isMultipleChoice: function() {
      return !!this.question.question_data.choices
    },
  },
  methods: {
    checkAnswer: function() {
      var vm = this

      axios.post(this.action, {
        id: vm.question.id,
        answer: vm.answer
      }).then(function (response) {
        console.log(response);
      }).catch(function (error) {
        console.log(error);
      })
    }
  }
}
</script>
