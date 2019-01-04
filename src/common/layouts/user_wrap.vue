<template>
  <wrap :navList="navList">
    <slot></slot>
  </wrap>
</template>
<script>
import Wrap from "@/common/layouts/wrap";
export default {
  data() {
    return {
      navList: [
        {
          title: "首页",
          href: "/index",
          icon : "el-icon-ali-homefill",
        },
        {
          title: "练习",
          href: "learn",
          icon : "el-icon-ali-learning_fill",
        },
        {
          title: "排行榜",
          href: "/rank",
          icon : "el-icon-ali-rankfill",
        }
      ]
    };
  },
  components: {
    Wrap
  }
};
</script>
