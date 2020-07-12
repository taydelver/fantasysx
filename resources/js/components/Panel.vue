<template>
  <transition name="slide-panel">
    <div v-if="open" class="slide-panel">
      <div class="slide-panel__header">
        <slot name="header"></slot>
      </div>
      <div class="slide-panle__content">
        <slot></slot>
      </div>
      <div v-if="$slots.footer" class="slide-panel__footer">
        <slot name="footer"></slot>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    open: Boolean
  }
}
</script>