<template>
    <div id="wrap">
        <div id="content">
            <appear-animate>
                <slot></slot>
            </appear-animate>

        </div>
        <div id="nav">
            <app-nav :list="navList"></app-nav>
        </div>
    </div>
</template>
<script>
import AppearAnimate from '@/common/components/appear_animate'
import AppNav from '@/common/components/nav'
export default {
  props: {
    navList: Array
  },
  components: {
    AppNav,
    AppearAnimate
  }
}
</script>
<style lang="scss">
#wrap {
  display: flex;
  flex-direction: column;
  @include size(100%);
}
#nav ul {
  border-top: 1px solid $line-color;
}
#content {
  flex: 1;
  background: $principal-color;
}
</style>
