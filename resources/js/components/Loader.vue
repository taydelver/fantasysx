<template>
  <transition name="fade">
    <div v-if="!loaded" class="page-loader">
      <div>
        <div class="loader"></div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    loaded: Boolean
  }
}
</script>