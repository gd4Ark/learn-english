<template>
  <pop-wrap
    padding="0"
    v-if="$route.name === 'setting/review'"
  >
    <div class="app-content">
      <Menu :optionsGroups="optionsGroups" />
    </div>
  </pop-wrap>
  <router-view v-else/>
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
          path: "/setting/review/partialSpell",
          label: "单词部分拼写"
        }
      ]
    ]
  })
};
</script>