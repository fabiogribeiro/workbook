<template>
  <div class="container class-md-10 offset-md-1">
    <form v-on:submit.prevent="checkAnswer">
        <div class="form-group row">
          <label for="answer" class="col-sm-3 col-form-label text-md-right">
            {{ formLabel }}
          </label>

          <div class="col-md-6 col-lg-4">
            <input id="answer" class="form-control" name="answer" v-model="userInput" required>
          </div>

          <div class="pt-3 pt-md-0 col-md-2 col-sm-12 col-xs-12 text-center">
            <button type="submit" class="w-100 btn btn-primary">
              {{ submitLabel }}
            </button>
          </div>
        </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ['challengeId', 'formLabel', 'submitLabel'],
  data: function() {
    return {
      userInput: ''
    }
  },
  methods: {
    checkAnswer: function() {
      var vm = this

      axios.post('/api/challenge/solve', {
        _method: 'PUT',
        challengeId: vm.challengeId,
        answer: vm.userInput
      }).then(function(response) {
        console.log(response.data.result)
      }).catch(function(error) {
        console.log(error)
      })
    }
  }
}
</script>
