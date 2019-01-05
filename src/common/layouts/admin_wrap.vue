<template>
  <AppWrap
    v-if="navList.length"
    :navList="navList"
  >
    <slot></slot>
  </AppWrap>
</template>
<script>
import AppWrap from "@/common/layouts/app_wrap";
export default {
  data() {
    return {
      navList: []
    };
  },
  mounted() {
    this.navList = [
      {
        title: "单词本管理",
        href: "/book",
        icon: "el-icon-tickets"
      }
    ];
  },
  components: {
    AppWrap
  }
};
</script>
