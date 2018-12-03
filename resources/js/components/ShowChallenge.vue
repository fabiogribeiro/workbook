<template>
  <div>
    <h1>{{ title }}</h1>
    <p>{{ body }}</p>
  </div>  
</template>

<script>
export default {
  props: ['title', 'body']
}
</script>
