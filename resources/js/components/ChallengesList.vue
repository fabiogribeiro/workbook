<template>
  <ul>
    <li class="list-unstyled"
      v-for="challenge in apiData"
      :key="challenge.id"
    >
      <a v-bind:href="baseUrl + challenge.slug">{{ challenge.title }}</a>
    </li>
  </ul>
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
</style>
