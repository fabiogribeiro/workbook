<template>
<div ref="mathElement">
  <form v-if="!isSolved" v-on:submit.prevent="checkAnswer" method="POST" action="/api/questions/answer">
    <div>
      <ul class="uk-list">
        <li
          v-for="(choice, index) in question.question_data.choices"
          v-bind:key="index"
        >{{ String.fromCharCode(index + 65) + '. ' + choice }}</li>
      </ul>
      <br>
      <select class="uk-select uk-width-2-3 uk-width-1-3@m">
        <option
          v-for="(choice, index) in question.question_data.choices"
          v-bind:key="index"
          v-bind:value="String.fromCharCode(index + 65)"
        >{{ String.fromCharCode(index + 65) }}</option>
      </select>
      <button v-if="!isUpdating" key="default" class="uk-button uk-button-primary">Submit</button>
      <div v-else uk-spinner key="updating" class="uk-margin-medium-left"></div>
    </div>
  </form>
  <div v-else>
    <ul class="uk-list">
      <li
        v-for="(choice, index) in question.question_data.choices"
        v-bind:key="index"
      >{{ String.fromCharCode(index + 65) + '. ' + choice }}</li>
    </ul>
    <br>
    <select class="uk-select uk-width-2-3 uk-width-1-3@m">
      <option
        v-for="(choice, index) in question.question_data.choices"
        v-bind:key="index"
        v-bind:value="String.fromCharCode(index + 65)"
      >{{ String.fromCharCode(index + 65) }}</option>
    </select>
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
    },
  },
  mounted: function () {
    window.MathJax.Hub.Queue(["Typeset", window.MathJax.Hub,this.$refs.mathElement])
  }
}
</script>

<style lang="scss" scoped>

.uk-list ul {
  padding-left: 0;
}

</style>
