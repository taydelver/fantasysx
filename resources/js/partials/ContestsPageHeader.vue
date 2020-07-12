<template>
  <div class="contests-page-header p-2">
    <div class="text-center">
      <!-- <div class="font-extrabold">{{currentContest.name}}</div> -->
      <div class="text-sm font-bold">{{currentContest.race_event.location}}<span class="mx-2">|</span>Round {{currentContest.race_event.round}}</div>
    </div>
    <selections-summary></selections-summary>
  </div>
</template>

<script>
import SelectionsSummary from './SelectionsSummary'
export default {
  components: {SelectionsSummary},
  computed: {
    currentContest() {
      return this.$store.getters['base/currentContest']
    },
  }
}
</script>

<style>
  .contests-page-header {
    background: #fff;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    position: relative;
    z-index: 2;
  }
</style>