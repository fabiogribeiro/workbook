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
          <input class="uk-radio" type="radio" name="choice" v-bind:value="String.fromCharCode(index + 65)" required>
          {{ choice }}
        </label><br>
      </div>
      <button class="uk-button uk-button-primary uk-margin-small">Submit</button>
    </div>
    <div v-else>
      <input class="uk-input uk-form-width-medium" type="text" placeholder="Answer">
      <button class="uk-button uk-button-primary">Submit</button>
    </div>
  </form>
</div>
</template>

<script>
export default {
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      action: '/api/questions/answer'
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
      console.log("checkAnswer")
    }
  }
}
</script>
