<template>
  <transition name="slide-panel">
    <div v-if="open" class="rider-panel slide-panel">
      <div class="slide-panel__header">
        <span @click="closePanel" class="slide-panel__back material-icons text-4xl">chevron_left</span>
        <div class="slide-panel__title flex items-center justify-center h-full font-bold">{{panelHeader}}</div>
      </div>
      
      <div class="slide-panel__body">
        <div class="relative" v-if="riders.length">
          <transition-group name="rider-selected">
            <rider-selection-card v-for="rider in riders" :key="rider.id" :rider="rider"></rider-selection-card>
          </transition-group>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import RiderSelectionCard from '../components/RiderSelectionCard'
export default {
  props: {
    raceClass: [String, Number],
  },
  components: {RiderSelectionCard},
  data() {
    return {
      
    }
  },
  watch: {
    open() {
      // if(this.open) {
      //   this.getRiders()
      // }
    },
    isFilled() {
      if(this.isFilled) {
        this.$store.commit('selections/setActiveSlot', {raceClass: null, position: null})
        this.closePanel()
      }
    }
  },
  methods: {
    closePanel() {
      this.$store.commit('selections/setActiveRiderPanel', null)
    },
  },
  computed: {
    panelHeader() {
      return `${this.raceClass} Riders`
    },
    activeRiderPanel() {
      return this.$store.getters['selections/activeRiderPanel']
    },
    open() {
       return this.activeRiderPanel == this.raceClass
    },
    currentRiders() {
      return this.$store.getters[`selections/riders${this.raceClass}`]
    },
    isFilled() {
      return this.$store.getters[`selections/riders${this.raceClass}Filled`]
    },
    riders: {
      get() {
        return this.$store.getters[`selections/riders${this.raceClass}`]
      },
      set(val) {
        this.$store.commit('selections/setRiders', {raceClass: this.raceClass, data: val})
      }
    }
  }
}
</script>

<style>

</style>