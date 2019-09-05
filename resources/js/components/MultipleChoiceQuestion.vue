<template>
  <div ref="mathElement">
    <form v-on:submit.prevent="checkAnswer" method="POST" :action="formAction">
      <div>
        <ul class="uk-list">
          <li
            v-for="(choice, index) in question.question_data.choices"
            v-bind:key="index"
          >{{ indexToChar(index) + '. ' + choice }}</li>
        </ul>
        <br>
        <select v-model="answer" :disabled="isSolved" class="uk-select uk-width-2-3 uk-width-1-3@m">
          <option
            v-for="(choice, index) in question.question_data.choices"
            v-bind:key="index"
            v-bind:value="indexToChar(index)"
          >{{ indexToChar(index) }}</option>
        </select>
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
import Question from './QuestionMixin'

export default {
  mixins: [Question],
  methods: {
    indexToChar: function (index) {
      return String.fromCharCode(index + 65)
    }
  }
}
</script>

<style lang="scss" scoped>

.uk-list ul {
  padding-left: 0;
}

</style>
