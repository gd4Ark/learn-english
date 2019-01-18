<template>
  <wrap
    padding="0"
    v-if="$route.name === 'setting'"
  >
    <div class="app-content">
      <Menu :optionsGroups="optionsGroups" />
    </div>
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
          path: "/setting/feedback",
          label: "反馈管理"
        },
        {
          path: "/setting/about",
          label: "关于"
        }
      ],
      [
        {
          path: "/setting/logout",
          label: "退出"
        }
      ]
    ]
  })
};
</script>