<template>
  <div v-bind:key="apiData.id">
    <h1>{{ apiData.title }}</h1>
    <div v-html="bodyHTML">
    </div>
  </div>
</template>

<script>
export default {
  props: ['apiData', 'activeItem'],
  computed: {
    bodyHTML: function() {
      return this.apiData.body_html
    }
  }
}
</script>

<style lang="scss" scoped>
div {
  font-size: 16px;
}
</style>
