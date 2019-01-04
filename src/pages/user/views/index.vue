<template>
  <wrap>
    <div class="index-container">
      <div class="app-header">
        <h1 class="title">清技背单词</h1>
      </div>
      <div class="content">
        <el-card
          shadow="never"
          :body-style="{ padding: '0px' }"
        >
          <div class="content-panel">
            <div
              v-if="$util.isEmptyObj($store.state.book.current)"
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
                {{$store.state.book.current.english_count}}
              </p>
              <p class="book-name">
                {{$store.state.book.current.name}}
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
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
import selectBook from "@/pages/user/components/selectBook";
export default {
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
  }
};
</script>
<style lang="scss" scoped>
.index-container {
  @include size(100%);
  @include flex-column;
  .content {
    @include flex-column;
    @include sub-center;
    @include padding;
    flex: 1;
    overflow: hidden;
    > * {
      width: 90%;
    }
    .content-panel {
      @include flex-column;
      @include sub-center;
      @include padding;
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
}
</style>