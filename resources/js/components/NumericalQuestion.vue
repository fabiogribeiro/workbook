<template>
  <div ref="mathElement">
    <form v-on:submit.prevent="checkAnswer" method="POST" :action="formAction">
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
        <div v-show="isFailed">
          <br>
          <div class="uk-text-warning">Wrong answer. Try again</div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Question from './QuestionMixin';

export default {
  mixins: [Question]
}
</script>
