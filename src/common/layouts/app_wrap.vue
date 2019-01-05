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
import AppearAnimate from "@/common/layouts/appear_animate";
import AppNav from "@/common/layouts/nav";
export default {
  props: {
    navList: Array
  },
  components: {
    AppNav,
    AppearAnimate
  }
};
</script>
<style lang="scss">
#wrap {
  display: flex;
  flex-direction: column;
  @include size(100%);
}
#content {
  flex: 1;
  overflow-x: hidden;
  background: $principal-color;
}
</style>
