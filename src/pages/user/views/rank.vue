<template>
  <wrap>
    <div class="index-container">
      <div class="app-header">
        <h1 class="title">清技背单词</h1>
      </div>
      <div class="content">
        <el-tabs
          :stretch="true"
          style="height: 100%;display: flex;flex-direction: column;"
        >
          <el-tab-pane label="日榜">
            <day-rank />
          </el-tab-pane>
          <el-tab-pane label="总榜">配置管理</el-tab-pane>
        </el-tabs>
      </div>
    </div>
  </wrap>
</template>

<script>
import wrap from "@/common/layouts/user_wrap.vue";
import { mapActions } from "vuex";
import dayRank from "@/pages/user/components/dayRank";
export default {
  components: {
    wrap,
    dayRank
  },
  mounted() {},
  methods: {
    ...mapActions({
      getData: "getBook"
    })
  }
};
</script>
<style lang="scss" scoped>
.index-container {
  @include size(100%);
  @include flex-column;
  .content {
    flex: 1;
    padding: 5px 0;
    overflow: hidden;
  }
}
</style>
<style lang="scss">
.el-tabs__item{
  font-size: 1rem;
}
.el-tabs__content{
  flex : 1;
  > div{
    height : 100%;
  }
}
</style>
