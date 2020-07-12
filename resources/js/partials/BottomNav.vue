<template>
  <div id="bottomNav">
    <div class="bottom-nav-list flex justify-between">
      <router-link class="bottom-nav-item block" v-for="link in links" :key="link.label" :to="{path: link.link}">
        <span class="material-icons">{{link.icon}}</span>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      links: [
        {label: 'Dashboard', link: '/dashboard', icon: 'home'},
        {label: 'Upcoming', link: '/upcoming', icon: 'event_note'},
        {label: 'Live', link: '/live', icon: 'radio_button_checked'},
        {label: 'Results', link: '/results', icon: 'assignment_turned_in'}
      ]
    }
  }
}
</script>

<style>

</style>