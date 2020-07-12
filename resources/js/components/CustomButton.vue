<template>
  <button @click="onClick" :class="{loading: loading}" class="btn relative">
    <span v-if="loading" class="button-loader relative"><div class="loader"></div></span>
    <span>
      <slot></slot>
    </span>
    
  </button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
  },
  methods: {
    onClick() {
      if(!this.loading) {
        this.$emit('click')
      } else {
        this.$emit('notclicked')
      }
    }
  }
}
</script>