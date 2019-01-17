<template>
  <pop-wrap
    padding="0"
    v-if="$route.name === 'setting/review'"
  >
    <Menu :optionsGroups="optionsGroups" />
  </pop-wrap>
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
          label: "单词部分拼写"
        }
      ]
    ]
  })
};
</script>