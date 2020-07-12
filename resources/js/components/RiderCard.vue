<template>
  <div @click="openRiderOptions" tabindex="-1" class="rider-card card is-clickable mb-3">
    <div v-if="!isEmpty" class="flex items-center rider-card__content py-3 px-4">
      <div class="rider-card__plate relative">
        <div><img :src="rider.plate_image"></div>
        <span class="rider-plate-number">{{rider.number}}</span>
      </div>
      <div class="ml-3">
        <div class="font-bold">{{rider.name}}</div>
      </div>
      <div class="ml-auto flex items-center"> 
        <span class="font-extrabold block">${{rider.money_value}}</span>
        <span class="rider-card__add-icon block material-icons ml-3">cancel</span>
      </div>
    </div>

    <div class="rider-card__content flex items-center rider-card__content--empty py-3 px-4" v-if="isEmpty">
      <span class="rider-card__rider-pos block">{{riderNumericPos}}</span>
      <div class="rider-card__placeholder w-full text-center uppercase opacity-50 text-sm">Select Rider</div>
      <span class="rider-card__arrow material-icons block opacity-50">chevron_right</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    raceClass: [String, Number],
    riderPos: String
  },
  data() {
    return {

    }
  },
  mounted() {
    setTimeout(() => {
      console.log(this.isEmpty)
    }, 1000)
  },
  methods: {
    openRiderOptions() {
      if(!this.isEmpty) {
        this.$store.commit('selections/removeRider', {raceClass: this.raceClass, position: this.riderPos})
      } else {
        this.$store.commit('selections/setActiveSlot', {raceClass: this.raceClass, position: this.riderPos})
        this.$store.commit('selections/setActiveRiderPanel', this.raceClass)
      }
      
    },
  },
  computed: {
    rider() {
      const key = `selections/rider${this.raceClass}${this.riderPos}`
      return this.$store.getters[key]
    },
    isEmpty() {
      return this.rider == null ? true : false
    },
    riderNumericPos() {
      const letters = ['a', 'b', 'c', 'd']
      return letters.indexOf(this.riderPos) + 1
    }
  }
}
</script>
