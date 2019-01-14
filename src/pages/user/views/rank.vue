<template>
  <wrap padding="0 2% 2%">
    <template slot="header">
      <select-module></select-module>
    </template>
    <div class="app-content">
      <rank-table @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
import selectModule from "@/pages/user/components/selectModule";
import rankTable from "@/pages/user/components/rankTable";
export default {
  components: {
    selectModule,
    rankTable,
  },
  methods: {
    ...mapActions({
      getData: "getRank"
    })
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  overflow: hidden;
}
</style>
<style lang="scss">
.el-tabs__header {
  margin: 0;
  background: white;
}
.el-tabs__item {
  font-size: 1rem;
}
.el-tabs__content {
  flex: 1;
  > div {
    height: 100%;
  }
}
</style>
