<template>
  <page :loaded="loaded" title="Dashboard">
    <template #before>
      <div class="user-toolbar flex px-3 py-2">
        <div class="user-toolbar__left">
          <div class="flex">
            <span class="material-icons block text-5xl">account_circle</span>
            <div class="self-center pl-1">
              <div class="font-extrabold text-xl leading-none">{{displayName}}</div>
              <a href="" class="text-xs">Edit Profile</a>
            </div>
          </div>
        </div>
        <div class="user-toolbar__right ml-auto">
          <div class="text-center">
            <div class="text-lg">148</div>
            <div class="text-xs">Points</div>
          </div>
        </div>
      </div>
    </template>
    <section class="contain">
      <div class="label label--1">Events</div>
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
        <div class="card event-card text-center bg-white" v-for="item in raceEvents" :key="item.id">
          <router-link :to="{path: `/event/${item.id}`}" class="block p-5">
            <div class="text-2xl uppercase font-extrabold">{{moment(item.date).format('MMM D')}}</div>
            <div class="text-xs">{{item.location}}</div>
          </router-link>
        </div>
      </div>
    </section>
  </page>
</template>

<script>
import moment from 'moment'
export default {
  data() {
    return {
      loaded: false,
       moment: moment
    }
  },
  mounted() {
    setTimeout(() => {
      this.loaded = true
    }, 400)
  },
  computed: {
    displayName() {
      return this.$store.getters['user/displayName']
    },
    raceEvents() {
      return this.$store.getters['base/events']
    }
  }
}
</script>

<style>

</style>