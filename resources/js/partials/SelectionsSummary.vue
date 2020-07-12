<template>
  <div class="contest-selections-actions-bar flex items-center pt-2">
    <div class="w-full">
      <div class="flex justify-between">
        <div class="flex items-center">
          <div class="text-center px-2">
            <div class="text-xs leading-none">Remaining</div>
            <div :class="{'text-error': remainingSalary < 0, 'text-green': remainingSalary >= 0}" class="font-bold">{{asCurrency(remainingSalary)}}</div>
          </div>
          <div class="text-center px-2">
            <div class="text-xs leading-none">Avg. Remaining</div>
            <div v-if="avgRemaining < 0">- -</div>
            <div v-else>{{asCurrency(avgRemaining)}}</div>
          </div>
          
        </div>
        <div class="flex items-center">
          <div class="px-2 text-center">
            <div class="text-xs leading-none">250 Riders</div>
            <div>{{filledSelections.riders250.length}}/4</div>
          </div>
          <div class="px-2 text-center">
            <div class="text-xs leading-none">450 Riders</div>
            <div>{{filledSelections.riders450.length}}/4</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$nextTick(function() {
      
    })
  },
  methods: {
    asCurrency(val) {
      return `$${val.toLocaleString()}`
    }
  },
  computed: {
    riderPanelOpen() {
      return this.$store.getters['selections/activeRiderPanel'] !== null
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
    remainingSalary() {
      return this.$tpd.misc.remainingSalary()
    },
    avgRemaining() {
      const filledCount = _.add(this.filledSelections.riders250.length, this.filledSelections.riders450.length)
      const diff = _.subtract(8, filledCount)
      return diff == 0 ? this.remainingSalary : _.round(_.divide(this.remainingSalary, diff))
      
    }
  } 
}
</script>