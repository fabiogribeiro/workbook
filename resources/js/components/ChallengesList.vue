<template>
<div class="col-md-12 col-lg-9 mx-auto">
  <div class="default-card" v-for="(challenges, skill) in apiData" :key="skill">
    <h3>{{ skill }} </h3>
    <div class="list-group list-group-flush">
      <a
        class="list-group-item"
        v-for="challenge in challenges" :key="challenge.id"
        v-bind:href="baseUrl + challenge.slug"
      >
        <div class="d-flex justify-content-between align-items-end w-100">
          <h5>{{ challenge.title }} </h5>
          <button class="btn btn-outline-success float-right">Solve</button>
        </div>
      </a>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: ['apiData', 'activeItem'],
  computed: {
    baseUrl: function() {
      return '/' + this.activeItem.domain + '/' + this.activeItem.slug + '/'
    }
  }
}
</script>

<style lang="scss" scoped>
button {
  width: 25%;
}

.list-group-item {
  &:first-child {
    border-top: 0;
  }
}

h3 {
  margin-top: 0.7rem;
  margin-left: 1.25rem;
  margin-bottom: 1.4rem;
}
</style>
