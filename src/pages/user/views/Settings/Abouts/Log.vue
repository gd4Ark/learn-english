<template>
  <pop-wrap>
    <div class="app-content">
      <template v-if="done">
        <el-card
          shadow="never"
          v-for="(item,index) in log.list"
          :key="index"
        >
          <div
            class="header"
            slot="header"
          >
            <span>版本：V{{ item.version }}</span>
            <time style="float: right;">{{ dateToYmd(item.created_at) }}</time>
          </div>
          <div
            v-if="item.fix !== '无'"
            class="text"
          >
            <h3>修复：</h3>
            <p>
              {{ item.fix }}
            </p>
          </div>
          <div
            v-if="item.feat !== '无'"
            class="text"
          >
            <h3>添加功能：</h3>
            <p>
              {{ item.feat }}
            </p>
          </div>
        </el-card>
      </template>
    </div>
  </pop-wrap>
</template>
<script>
import { mapActions, mapState } from "vuex";
export default {
  data: () => ({
    done: false
  }),
  methods: {
    ...mapActions(["getLog"]),
    dateToYmd(d) {
      return d.split(" ")[0];
    }
  },
  async created() {
    await this.getLog();
    this.done = true;
  },
  computed: {
    ...mapState(["log"])
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  overflow-y: auto;
}
.el-card + .el-card {
  margin-top: 2vh;
}
.header {
  @include sub-center;
  justify-content: space-between;
}
.text + .text {
  margin-top: 1vh;
}
time {
  font-size: 0.9rem;
}
.text {
  h3 {
    font-size: 0.9rem;
    font-weight: normal;
    margin-bottom: 1vh;
  }
  p {
    text-indent: 2rem;
    font-size: 0.7rem;
  }
}
</style>
