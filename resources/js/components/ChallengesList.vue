<template>
<div class="col-md-8 col-lg-9">
  <div v-for="(challenges, skill) in apiData" :key="skill" class="card">
    <div class="card-header">
      {{ skill }}
    </div>
    <ul class="list-group list-group-flush">
      <li v-for="challenge in challenges" :key="challenge.id" class="list-group-item">
        <a v-bind:href="baseUrl + challenge.slug">
          <p class="overflow-ellipsis">{{ challenge.title }}</p>
          <button class="btn btn-outline-success float-right"> Solve </button>
        </a>
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
  font-size: 1.5rem;

  p {
    display: inline-block;
    margin-bottom: 0;
    max-width: 70%;
    vertical-align: top;
  }

  a {
    display: block;
  }
}

button {
  display: inline-block;
  width: 25%;
}

.card {
  margin-bottom: 25px;
}
</style>
