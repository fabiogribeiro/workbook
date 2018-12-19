<template>
  <transition appear name="fade" mode="out-in">
    <div v-bind:key="apiData.id">
      <h1>{{ apiData.title }}</h1>
      <div v-html="finalHTML">
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: ['apiData', 'activeItem'],
  computed: {
    finalHTML: function() {
      return marked(this.apiData.body)
    }
  }
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .2s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
