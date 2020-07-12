<template>
  <page :loaded="loaded">
    <div class="page-title page-title--default">
      <div class="font-bold text-base text-center">Upcoming Contests</div>
    </div>
    <section class="contain">
      <div v-if="contests.length < 1" class="section__no-contests text-center py-8">
        <div class="text-2xl text-light">No upcoming entries</div>
      </div>
    </section>
  </page>
</template>

<script>
export default {
  data() {
    return {
      loaded: true,
      contests: []
    }
  }
}
</script>

<style>

</style>