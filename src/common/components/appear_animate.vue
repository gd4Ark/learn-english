<template>
    <div :class="['appear-animate',{'show':show}]">
        <slot></slot>
    </div>
</template>
<script>
export default {
  data() {
    return {
      show: false
    }
  },
  mounted() {
    setTimeout(() => {
      this.show = true
    })
  },
  destroyed() {
    setTimeout(() => {
      this.show = false
    })
  }
}
</script>
