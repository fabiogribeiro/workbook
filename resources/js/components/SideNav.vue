<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12">
        <ul
          v-for="(items, title) in allItems"
          :key="title"
          class="list-unstyled">
          <div
            v-on:click="toggleTitle(title)"
            class="side-header-wrapper">
            <slot name="header" v-bind:title="title">
            </slot>
          </div>
          <div
            v-if="activeTitles.includes(title)"
            class="side-list-wrapper">
            <li
              v-for="item in items"
              :key="item.id"
              v-bind:class="{ active: item.id === activeItem.id }">
              <a
                v-bind:href="baseUrl + item.slug"
                v-on:click.prevent="updateData(item)">
                <slot v-bind:item="item">
                </slot>
              </a>
            </li>
          </div>
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
      activeItem: this.activeInit,
      activeTitles: [this.getInitialTitle()],
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
    },
    toggleTitle: function(title) {
      if (this.activeTitles.includes(title)) {
        this.activeTitles = _.filter(this.activeTitles, function(t) {
          return t != title
        })
      }
      else {
        this.activeTitles.push(title)
      }
    },
    getInitialTitle: function() {
      for (var title in this.allItems) {
        if (this._containsItem(this.allItems[title], this.activeInit))
          return title
      }
    },
    _containsItem: function(arr, object) {
      return !!_.find(arr, function(o) { return _.isMatch(o, object) })
    },
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

<style lang="scss" scoped>
li {
  transition: all 0.2s;

  a {
    padding-left: 10px;
    display: block;
  }

  &:hover {
    background-color: #eaecef;
    padding-left: 8px;
  }
}

.side-header-wrapper {
  cursor: pointer;
}
</style>
