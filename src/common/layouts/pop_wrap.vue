<template>
    <div id="pop-wrap">
        <appear-animate>
            <slot></slot>
        </appear-animate>
    </div>
</template>
<script>
import AppearAnimate from '@/common/components/appear_animate'
export default {
  components: {
    AppearAnimate
  }
}
</script>

<style lang="scss" scoped>
#pop-wrap {
  position: absolute;
  top: 0;
  left: 0;
  @include size(100%);
  background: $secondary-color;
  > * {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    @include size(100%);
  }
}
</style>
