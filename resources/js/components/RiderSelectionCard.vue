<template>
  <div @click="selectRider" tabindex="-1" :class="{disabled: lock}" class="rider-card rider-selection-card card is-clickable mb-3">
    <div class="flex rider-card__content items-center py-3 px-4">
      <div class="rider-card__plate relative">
        <div><img :src="rider.plate_image"></div>
        <span class="rider-plate-number">{{rider.number}}</span>
      </div>
      <div class="ml-3">
        <div class="font-bold">{{rider.name}}</div>
      </div>
      <div class="ml-auto flex items-center"> 
        <span class="font-extrabold block">${{rider.money_value}}</span>
        <span class="rider-card__add-icon block material-icons ml-3 text-green">add_circle</span>
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  props: {
    rider: Object
  },
  data() {
    return {
      lock: false
    }
  },
  mounted() {

  },
  methods: {
    selectRider() {
      this.lock = true
      this.$store.commit('selections/setRider', this.rider)
    },

  },
  computed: {
    activeSlot() {
      return this.$store.getters['selections/activeSlot']
    },
    raceClass() {
      return this.activeSlot.raceClass
    },
    isFilled() {
      const key = `selections/rider${this.raceClass}${this.activeSlot.position}`
      const slot = this.$store.getters[key]
      return slot == null ? false : true
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