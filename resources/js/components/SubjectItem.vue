<template>
  <div>{{ item.title }}</div>
</template>

<script>
export default {
  props: ['item']
}
</script>

<style scoped>
div {
  padding-top: 0.5em;
}
</style>
