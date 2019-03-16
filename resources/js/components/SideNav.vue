<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <ul class="list-unstyled">
          <slot name="header">
          </slot>
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
      <slot
        v-bind:api-data="apiData"
        v-bind:active-item="activeItem"
        name="main-content"
      ></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ['baseUrl', 'apiUrl', 'activeInit', 'allItems', 'initialData'],
  data: function() {
    return {
      apiData: this.initialData,
      activeItem: this.activeInit
    }
  },
  computed: {
    firstLoadComplete: function() {
      return !!this.apiData
    }
  },
  methods: {
    updateData: function(item, shouldPush = true) {
      if (this.firstLoadComplete && this.activeItem.id === item.id) return

      var vm = this;

      axios.get(this.apiUrl + item.slug)
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

    vm.$slots.header[0].elm.hidden = false  // Hack to prevent header showing before page load

    vm.updateData(this.activeItem, false)

    history.replaceState(this.activeItem, '', this.activeItem.slug)

    window.onpopstate = function(event) {
      vm.updateData(event.state, false)
    } 
  }
}
</script>

<style lang="scss" scoped>
li {
  transition: all 0.2s;

  div {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }

  &:hover {
    background-color: #eaecef;
    padding-left: 8px;
  }
}
</style>
