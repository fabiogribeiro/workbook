<template>
  <div class="pt-3 col-md-10 col-lg-7 float-right">
    <form v-on:submit.prevent="checkAnswer">
      <div class="form-group row">
        <label for="answer" class="col-sm-3 col-form-label">
          {{ formLabel }}
        </label>
        <div class="col-md-9">
          <input id="answer" class="form-control" name="answer" v-model="userInput" required>
        </div>
      </div>
      <button type="submit" class="w-100 btn btn-primary">
        {{ submitLabel }}
      </button>
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
