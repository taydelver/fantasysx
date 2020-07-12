<template>
  <transition name="tab-panel">
    <div v-if="open" class="tab-panel">
      <slot></slot>
    </div>
  </transition>
</template>

<script>
export default {

}
</script>

<style>
  .tab-panel {
    transition: all 0.4s ease;
  }
  .tab-panel-enter {
    transform: translateX(100%);
  }
  .tab-panel-leave-to {
    transform: translateX(-100%);
  }
</style>