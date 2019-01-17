<template>
  <wrap
    padding="0"
    v-if="$route.name === 'setting'"
  >
    <Menu :optionsGroups="optionsGroups" />
  </wrap>
  <router-view v-else></router-view>
</template>
<script>
import Menu from "@/common/components/Menu";
export default {
  components: {
    Menu
  },
  data: () => ({
    optionsGroups: [
      [
        {
          path: "/setting/password",
          label: "修改密码"
        }
      ],
      [
        {
          path: "/setting/rank",
          label: "排行榜设置"
        },
        {
          path: "/setting/review",
          label: "复习模块设置"
        }
      ],
      [
        {
          path: "/setting/about",
          label: "关于"
        },
        {
          path: "/setting/feedback",
          label: "帮助与反馈"
        }
      ],
      [
        {
          path: "/",
          label: "退出"
        }
      ]
    ]
  })
};
</script>