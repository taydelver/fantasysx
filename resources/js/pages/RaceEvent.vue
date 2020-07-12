<template>
  <page :loaded="loaded">
    <section v-if="loaded" class="contain">
      <div class="my-4 text-center">
        <div class="font-extrabold">{{raceEvent.name}}</div>
        <div class="text-sm">{{moment(raceEvent.date).format('MMM DD, YYYY')}}</div>
      </div>
      <template v-if="raceEvent.selections_open">
        <div class="card card-button" v-for="contest in raceEvent.contests" :key="contest.id">
          <router-link class="flex p-4 items-center" :to="{path: `/contest/${contest.id}/selections`}">
            <div class="font-extrabold">{{contest.name}}</div>
            <span class="block ml-auto material-icons">chevron_right</span>
          </router-link>
        </div>
      </template>

      <div v-if="!raceEvent.selections_open" class="section__not-open text-center py-8">
        <div class="text-2xl text-light">Selections are not available for this contest yet.</div>
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
  created() {

  },
  mounted() {
    setTimeout(() => {
      this.loaded = true
    }, 300)
    // this.getContests()
  },
  methods: {
    // getContests() {
    //   this.$store.dispatch('base/getContests', this.$route.params.id)
    // }
  },
  computed: {
    events() {
      return this.$store.getters['base/events']
    },
    raceEvent() {
      return this.events.filter(e => e.id == this.$route.params.id)[0]
    }
    // contests() {
    //   return this.$store.getters['base/contests']
    // }
  }
}
</script>

<style>

</style>