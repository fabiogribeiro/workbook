<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <ul class="list-unstyled">
          <slot name="header"></slot>
          <li
            v-for="item in allItems"
            :key="item.id"
            v-bind:class="{ active: item.id === activeItem.id }">
            <a
              v-bind:href="baseUrl + item.slug"
              v-on:click.prevent="updateData(item)">
              <slot v-bind:item="item">
              </slot>
            </a>
          </li>
        </ul>
      </div>
      <slot v-bind:data="apiData" name="main-content"></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ['baseUrl', 'apiUrl', 'activeInit', 'allItems'],
  data: function() {
    return {
      apiData: [],
      activeItem: this.activeInit
    }
  },
  methods: {
    updateData: function(item, shouldPush = true) {
      if (this.activeItem.id === item.id && this.apiData.length != 0) return

      var vm = this;

      axios.get(this.apiUrl + item.id)
        .then(function (response) {
          vm.apiData = response.data
          vm.activeItem = item

          if (shouldPush) history.pushState(item, '', item.slug)
        })
        .catch(function (error) {
          console.log(error)
        })
    }
  },
  mounted: function() {
    var vm = this

    vm.updateData(this.activeItem, false)

    history.replaceState(this.activeItem, '', this.activeItem.slug)

    window.onpopstate = function(event) {
      vm.updateData(event.state, false)
    } 
  }
}
</script>
