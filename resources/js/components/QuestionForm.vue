<template>
<div>
  <p>{{ question.title }}</p>

  <form v-if="!isSolved" v-on:submit.prevent="checkAnswer" method="POST" action="/api/questions/answer">
    <div
        v-if="isMultipleChoice"
        class="uk-form-controls uk-height-small"
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
      <button v-if="!isUpdating" key="default" class="uk-button uk-button-primary uk-margin-small-top">Submit</button>
      <div v-else uk-spinner key="updating" class="uk-margin-medium-left uk-margin-small-top"></div>
    </div>
    <div v-else>
      <input
        class="uk-input uk-form-width-medium"
        type="text"
        v-model="answer"
        placeholder="Answer"
        required>
      <button v-if="!isUpdating" key="default" class="uk-button uk-button-primary">Submit</button>
      <div v-else uk-spinner key="updating" class="uk-margin-medium-left"></div>
    </div>
  </form>

  <div v-else>
    <span uk-icon="icon: check"></span>
    Question solved
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      action: '/api/questions/answer',
      answer: '',
      isUpdating: false,
      isSolved: this.question.solved
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
      vm.isUpdating = true

      axios.post(this.action, {
        id: vm.question.id,
        answer: vm.answer
      }).then(function (response) {
        setTimeout(function() {
          vm.isSolved = true
          vm.isUpdating = false
        }, 500)
      }).catch(function (error) {
        console.log(error);
      })
    }
  }
}
</script>

<style lang="scss">

span.uk-icon {
  color: green;
}

</style>
