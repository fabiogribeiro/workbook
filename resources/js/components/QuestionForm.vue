<template>
  <div>
    <p>{{ question.title }}</p>

    <multiple-choice-question
      v-if="isMultipleChoice"
      v-bind:question="this.question"
    ></multiple-choice-question>
    <numerical-question
      v-else
      v-bind:question="this.question"
    ></numerical-question>
  </div>
</template>

<script>
export default {
  props: ['question'],
  computed: {
    isMultipleChoice: function () {
      return !!this.question.question_data.choices
    }
  }
}
</script>
