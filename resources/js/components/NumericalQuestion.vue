<template>
  <div ref="mathElement">
    <form v-on:submit.prevent="checkAnswer" method="POST" action="/api/questions/answer">
      <div>
        <div class="uk-inline uk-width-2-3 uk-width-1-3@m">
          <span class="uk-form-icon" uk-icon="icon: pencil"></span>
          <input
            class="uk-input"
            :disabled="isSolved"
            type="text"
            v-model="answer"
            required
          >
        </div>
        <div v-if="!isSolved" class="uk-inline">
          <button v-if="!isUpdating" key="default" class="uk-button uk-button-primary">Submit</button>
          <div v-else uk-spinner key="updating" class="uk-margin-medium-left"></div>
        </div>
        <div v-else>
          <br>
          <div class="uk-text-success">Correct answer</div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      action: '/api/questions/answer',
      isSolved: this.question.solved,
      isUpdating: false,
      answer: this.question.solved ? this.question.question_data.answer : '',
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
  },
  mounted: function () {
    window.MathJax.Hub.Queue(["Typeset", window.MathJax.Hub,this.$refs.mathElement])
  },
}
</script>
