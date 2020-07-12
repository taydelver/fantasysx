<template>
  <page class="page--contests pt-4 pb-4" :loaded="loaded">
    <div>
      <div class="mb-4">
        <div class="flex px-3 mb-2">
          <div class="font-bold mr-auto">250 Riders</div>
          <div class="text-xs font-bold">{{filledSelections.riders250.length}}/4</div>
        </div>
        <div>
          <rider-card rider-pos="a" race-class="250"></rider-card>
          <rider-card rider-pos="b" race-class="250"></rider-card>
          <rider-card rider-pos="c" race-class="250"></rider-card>
          <rider-card rider-pos="d" race-class="250"></rider-card>
        </div>
      </div>
      <div class="mb-4">
        <div class="flex px-3 mb-2">
          <div class="font-bold mr-auto">450 Riders</div>
          <div class="text-xs font-bold">{{filledSelections.riders450.length}}/4</div>
        </div>
        <div>
          <rider-card rider-pos="a" race-class="450"></rider-card>
          <rider-card rider-pos="b" race-class="450"></rider-card>
          <rider-card rider-pos="c" race-class="450"></rider-card>
          <rider-card rider-pos="d" race-class="450"></rider-card>
        </div>
      </div>
    </div>
    <!-- PANELS -->
    <rider-panel race-class="250"></rider-panel>
    <rider-panel race-class="450"></rider-panel>

    <!-- <template #after>
      <div class="px-5 mt-4">
        <button class="btn btn-lg w-full block btn-green">Submit</button>
      </div>
    </template> -->
  </page>
</template>

<script>
import RiderCard from '../components/RiderCard'
import RiderPanel from '../partials/RiderPanel'
import SelectionsSummary from '../partials/SelectionsSummary'
import moment from 'moment'
export default {
  components: {RiderCard, RiderPanel, SelectionsSummary},
  data() {
    return {
      loaded: false,
      moment: moment
    }
  },
  mounted() {
    this.init()
    .then(res => console.log(res))
    .catch(err => console.log(err))
    .finally(() => {
      this.loaded = true
    })
  },
  methods: {
    async init() {
      const contests = await this.$store.dispatch('base/getContest', this.$route.params.id)
      const riders250 = await this.$store.dispatch('selections/getRiders', 250)
      const riders450 = await this.$store.dispatch('selections/getRiders', 450)
      const checkUserContest = await this.$store.dispatch('selections/checkUserContestSelections', this.$route.params.id)
      return Promise.all([contests, riders250, riders450])
    },
    checkUserContest() {
      return new Promise((resolve, reject) => {
        this.$store.dispatch('user/checkUserContest', this.$route.params.id)
        .then(res => {
          if(res.data) {

          }
        })
      })
    }
  },
  computed: {
    currentContest() {
      return this.$store.getters['base/currentContest']
    },
    isFilled250() {
      const data = this.$store.getters['selections/riders250Filled']
      return data
    },
    allSelected() {
      return this.$store.getters['selections/allSelectedRiders']
    },
    filledSelections() {
      const r250 = this.allSelected.riders250.filter(r => {
        return _.isObject(r) && r !== null
      })
      const r450 = this.allSelected.riders450.filter(r => {
        return _.isObject(r) && r !== null
      })
      return {
        riders250: r250,
        riders450: r450
      }
    },
    
  }
}
</script>