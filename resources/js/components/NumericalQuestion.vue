<template>
<div>
  <form v-if="!isSolved" v-on:submit.prevent="checkAnswer" method="POST" action="/api/questions/answer">
    <div>
      <input
        class="uk-input uk-form-width-medium"
        v-bind:disabled="isSolved"
        type="text"
        v-model="answer"
        placeholder="Answer"
        required
      >
      <button v-if="!isUpdating" key="default" class="uk-button uk-button-primary">Submit</button>
      <div v-else uk-spinner key="updating" class="uk-margin-medium-left"></div>
    </div>
  </form>
  <div v-else>
    <input
      class="uk-input uk-form-width-medium"
      v-bind:disabled="isSolved"
      type="text"
      v-model="answer"
      placeholder="Answer"
      required
    >
    <button class="uk-button uk-button-secondary">Solved</button>
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
