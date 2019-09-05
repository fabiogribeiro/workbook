var Question = {
  props: ['question'],
  data() {
    return {
      formAction: '/api/questions/answer',
      status: this.question.solved ? 'solved' : 'unsolved',
      answer: this.question.question_data.answer || '',
    }
  },
  mounted: function () {
    window.MathJax.Hub.Queue(["Typeset", window.MathJax.Hub,this.$refs.mathElement])
  },
  computed: {
    isSolved: function () {
      return this.status === 'solved'
    },
    isUpdating: function () {
      return this.status === 'updating'
    }
  },
  methods: {
    checkAnswer: function() {
      var vm = this
      vm.status = 'updating'

      axios.post(this.formAction, {
        id: vm.question.id,
        answer: vm.answer
      }).then(function (response) {
        setTimeout(function() {
          vm.status = 'solved'
        }, 500)
      }).catch(function (error) {
        console.log(error);
      })
    },
  },
}

export default Question
