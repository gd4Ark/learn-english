<template>
  <wrap padding="0 0 2% 0">
    <div class="app-content">
      <el-tabs
        :stretch="true"
        style="height: 100%;display: flex;flex-direction: column;"
      >
        <el-tab-pane label="日榜">
          <day-rank />
        </el-tab-pane>
        <el-tab-pane label="总榜">
          <day-rank />
        </el-tab-pane>
      </el-tabs>
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
import dayRank from "@/pages/user/components/dayRank";
export default {
  components: {
    dayRank
  },
  methods: {
    ...mapActions({
      getData: "getBook"
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
