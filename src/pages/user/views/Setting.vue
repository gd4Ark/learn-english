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
          path: "/setting/feedback",
          label: "帮助与反馈"
        },
        {
          path: "/setting/about",
          label: "关于"
        }
      ]
    ]
  })
};
</script>