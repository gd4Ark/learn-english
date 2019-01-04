<template>
  <wrap
    v-if="navList.length"
    :navList="navList"
  >
    <slot></slot>
  </wrap>
</template>
<script>
import Wrap from "@/common/layouts/wrap";
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
        icon : "el-icon-tickets",
      },
    ];
  },
  components: {
    Wrap
  }
};
</script>
