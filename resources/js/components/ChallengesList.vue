<template>
<div class="col-md-8 col-lg-9">
  <div class="default-card" v-for="(challenges, skill) in apiData" :key="skill">
    <h3>{{ skill }} </h3>
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

.list-group-item {
  &:first-child {
    border-top: 0;
  }
}

h3 {
  margin-top: 0.7rem;
  margin-left: 1.25rem;
  margin-bottom: 1.4rem;
  border-bottom: 2px solid #38c172;
  display: inline-block;
}
</style>
