<template>
  <wrap padding="0 2% 2%">
    <template slot="header">
      <select-module @get-data="getData" />
    </template>
    <div class="app-content">
      <rank-table @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
import SelectModule from "@/pages/user/components/SelectModule";
import RankTable from "@/pages/user/tables/RankTable";
export default {
  components: {
    SelectModule,
    RankTable
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
