<template>
  <div class="pt-3 row">
    <div class="col-md-6 my-auto">
      <ul class="list-group list-group-horizontal justify-content-center">
        <li v-for="i in numberInputs"
            v-bind:key="i"
            class="list-group-item">
          <a v-bind:class="{active: i === activeInput}" href="#">{{ i }}</a>
        </li>
      </ul>
    </div>
  <div class="col-md-6">
    <form v-on:submit.prevent="checkAnswer">
      <div class="form-group row">
        <label for="answer" class="col-sm-3 col-form-label">
          {{ $t('Answer') }}
        </label>
        <div class="col-md-9">
          <input id="answer" class="form-control" name="answer" v-model="userInput" required>
        </div>
      </div>
      <button type="submit" class="w-100 btn btn-outline-primary">
        {{ $t('Submit') }}
      </button>
    </form>
  </div>
  </div>
</template>

<script>
export default {
  props: ['challengeId'],
  data: function() {
    return {
      userInput: '',
      numberInputs: 5,
      activeInput: 2,
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

<style lang="scss" scoped>
li {
  margin-left: 8px;
  margin-right: 8px;
  padding: 0;
  border: 0;

  a {
    display: flex;
    padding: 0.4rem 0.9rem;
    border-radius: 50% !important;

    &:hover {
      background-color: #eaecef;
    }

    &.active {
      background-color: #3490dc;
      color: #fff;
    }
  }
}
</style>
