<template>
  <wrap>
    <div class="app-content">
      <el-card
        shadow="never"
        :body-style="{ padding: '0px' }"
      >
        <div class="content-panel">
          <div
            v-if="!currentBook"
            class="message"
          >
            <i
              style="font-size:1.5rem;margin-bottom:1vh;"
              class="el-icon-ali-sad1"
            ></i>
            没有选择单词本
          </div>
          <div v-else>
            <p class="english-count">
              {{currentBook.english_count}}
            </p>
            <p class="book-name">
              {{currentBook.name}}
            </p>
            <el-button
              type="text"
              class="button"
              icon="el-icon-ali-form"
              @click="$router.push('/english')"
            >查看单词列表</el-button>
          </div>
        </div>
      </el-card>
      <el-button
        @click="randomModule"
        type="primary"
      >随机模块</el-button>
      <select-book />
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
import ReviewModules from "@/common/mixins/ReviewModules";
import CurrentBook from "@/common/mixins/CurrentBook";
import SelectBook from "@/pages/user/components/SelectBook";
export default {
  mixins: [ReviewModules,CurrentBook],
  components: {
    SelectBook
  },
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      getData: "getBook"
    }),
    randomModule() {
      const modules = this.reviewModules;
      const path = modules[this.$util.random(0,modules.length)].path;
      this.$router.push('/reviewing/' + path);
    }
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  @include sub-center;
  flex: 1;
  overflow: hidden;
  > * {
    width: 90%;
  }
  > button {
    margin: 6vh 0;
  }
  .content-panel {
    @include flex-column;
    @include sub-center;
    min-height: 45vh;
    > div {
      @include flex-column;
      @include sub-center;
    }
    * + * {
      margin-top: 4vh;
    }
    .english-count {
      font-size: 2rem;
      font-weight: 700;
    }
  }
}
</style>