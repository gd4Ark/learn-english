<template>
  <div id="pop-wrap">
    <slot name="header">
      <div class="app-header">
        <div class="left">
          <slot name="back">
            <back v-if="useBack" />
          </slot>
          <h1 class="title">
            <template v-if="showSiteTitle">
              {{ $config.app_title }} -
            </template>
            <template v-if="showTitle">
              {{$route.meta.title}}
            </template>
          </h1>
        </div>
        <slot name="header-right">

        </slot>
      </div>
    </slot>
    <div id="content"
         :style="contentStyle">
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
    showSiteTitle: {
      type: Boolean,
      default: false
    },
    showTitle: {
      type: Boolean,
      default: true
    },
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
