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
      navList: [
        {
          title: "首页",
          href: "/index",
          icon: "el-icon-ali-homefill"
        },
        {
          title: "练习",
          href: "learn",
          icon: "el-icon-ali-learning_fill"
        },
        {
          title: "排行榜",
          href: "/rank",
          icon: "el-icon-ali-rankfill"
        }
      ]
    };
  },
  components: {
    AppWrap
  }
};
</script>
