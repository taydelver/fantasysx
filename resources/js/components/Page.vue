<template>
  <div class="page">
    <loader :loaded="loaded"></loader>
    <div v-if="$slots.before" class="page__before">
      <slot name="before"></slot>
    </div>
    <div class="page__content">
      <slot></slot>
    </div>
    <div v-if="$slots.after" class="page__after">
      <slot name="after"></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    loaded: Boolean
  }
}
</script>