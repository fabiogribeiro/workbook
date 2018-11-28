<template>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">{{ subjects[0].domain }}</div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="subject in subjects" :key="subject.id">
              {{ subject.title }}
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <ul>
          <li v-for="challenge in challenges" :key="challenge.id">
            <h1>{{ challenge.title }}</h1>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['subjects', 'challenges'],
  data: function() {
    return {
      subjects: this.subjects,
      challenges: this.challenges
    }
  }
}
</script>
