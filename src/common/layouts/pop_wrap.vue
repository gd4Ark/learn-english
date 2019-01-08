<template>
  <div id="pop-wrap">
    <slot name="header">
      <div class="app-header">
        <back v-if="useBack" />
        <h1 class="title">清技背单词 - {{$route.meta.title}}</h1>
      </div>
    </slot>
    <div id="content" :style="contentStyle">
      <appear-animate>
        <slot></slot>
      </appear-animate>
    </div>
  </div>
</template>
<script>
import AppearAnimate from "@/common/layouts/appear_animate";
export default {
  components: {
    AppearAnimate
  },
  props: {
    useBack: {
      type: Boolean,
      default: true
    },
    padding : {
      type : String,
      default : "2%",
    }
  },
  computed : {
    contentStyle(){
      return {
        padding : this.padding,
      }
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
