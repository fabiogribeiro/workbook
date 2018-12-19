<template>
  <transition appear name="fade" mode="out-in">
    <div v-bind:key="apiData.id">
      <h1>{{ apiData.title }}</h1>
      <p>{{ apiData.body }}</p>
    </div>
  </transition>
</template>

<script>
export default {
  props: ['apiData', 'activeItem'],
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
