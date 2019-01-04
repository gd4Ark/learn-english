<template>
    <div id="pop-wrap">
        <appear-animate>
            <slot></slot>
        </appear-animate>
    </div>
</template>
<script>
import AppearAnimate from '@/common/layouts/appear_animate'
export default {
  components: {
    AppearAnimate
  }
}
</script>

<style lang="scss" scoped>
#pop-wrap {
  @include po-abs;
  @include size(100%);
  background: $principal-color;
  > * {
    @include center;
    @include size(100%);
  }
}
</style>
