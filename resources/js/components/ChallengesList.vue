<template>
<div class="col-md-8">
  <div v-for="(challenges, skill) in apiData" :key="skill" class="card">
    <div class="card-header">
      {{ skill }}
    </div>
    <ul class="list-group list-group-flush">
      <li v-for="challenge in challenges" :key="challenge.id" class="list-group-item">
        <a v-bind:href="baseUrl + challenge.slug">{{ challenge.title }}</a>
      </li>
    </ul>
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
li {
  font-size: 28px;
}

.card {
  margin-bottom: 25px;
}
</style>
