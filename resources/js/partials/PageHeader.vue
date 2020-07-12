<template>
  <div class="page-main-header">
    <div v-html="content"></div>
  </div>
</template>

<script>
export default {
  props: {
    content: String
  }
}
</script>

<style>

</style>