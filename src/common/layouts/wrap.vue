<template>
  <div id="wrap">
    <div class="app-header">
      <h1 class="title">{{$config.title}} - {{$route.meta.title}}</h1>
    </div>
    <div
      id="content"
      :style="contentStyle"
    >
      <transition name="el-fade-in">
        <slot v-if="load"></slot>
      </transition>
    </div>
    <div id="nav">
      <app-nav :list="navList"></app-nav>
    </div>
  </div>
</template>
<script>
import AppNav from "@/common/layouts/nav";
export default {
  components: {
    AppNav,
  },
  data: () => ({
    load: false,
    navList: []
  }),
  props: {
    padding: {
      type: String,
      default: "2%"
    }
  },
  mounted() {
    setTimeout(() => {
      this.load = true;
    }, 0);
    this.navList = this.$router.options.routes.filter(
      el => el.meta && el.meta.inNav
    );
  },
  computed: {
    contentStyle() {
      return {
        padding: this.padding
      };
    }
  }
};
</script>
<style lang="scss">
#wrap {
  @include size(100%);
  @include flex-column;
}
#content {
  @include padding;
  flex: 1;
  overflow-x: hidden;
  background: $principal-color;
}
</style>
