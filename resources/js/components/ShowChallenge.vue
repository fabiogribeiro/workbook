<template>
  <transition appear name="fade" mode="out-in">
    <div v-bind:key="apiData.id">
      <h1>{{ apiData.title }}</h1>
      <div v-html="bodyHTML">
      </div>
    </div>
  </transition>
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
.fade-enter-active, .fade-leave-active {
  transition: opacity .2s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}

div {
  font-size: 16px;
}
</style>
