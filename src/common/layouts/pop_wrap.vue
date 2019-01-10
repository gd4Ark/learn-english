<template>
  <div id="pop-wrap">
    <slot name="header">
      <div class="app-header">
        <slot name="back">
          <back v-if="useBack" />
        </slot>
        <h1 class="title">{{$config.title}} - {{$route.meta.title}}</h1>
      </div>
    </slot>
    <div
      id="content"
      :style="contentStyle"
    >
      <transition name="el-fade-in">
        <template>
          <slot v-if="load"></slot>
        </template>
      </transition>
    </div>
  </div>
</template>
<script>
export default {
  data: () => ({
    load: false
  }),
  props: {
    useBack: {
      type: Boolean,
      default: true
    },
    padding: {
      type: String,
      default: "2%"
    }
  },
  mounted() {
    setTimeout(() => {
      this.load = true;
    }, 0);
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

<style lang="scss" scoped>
#pop-wrap {
  @include po-abs;
  @include size(100%);
  @include flex-column;
  background: $principal-color;
  #content {
    flex: 1;
  }
}
</style>
