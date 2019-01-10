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
      <select-book />
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
import selectBook from "@/pages/user/components/selectBook";
import currentBook from "@/common/mixins/currentBook";
export default {
  mixins : [currentBook],
  components: {
    selectBook
  },
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      getData: "getBook"
    })
  },
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
  .content-panel {
    @include flex-column;
    @include sub-center;
    min-height: 35vh;
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