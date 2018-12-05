<template>
  <div>
    <h1>{{ apiData.title }}</h1>
    <p>{{ apiData.body }}</p>
  </div>  
</template>

<script>
export default {
  props: ['apiData', 'activeItem'],
}
</script>
