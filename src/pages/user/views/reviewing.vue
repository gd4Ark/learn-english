<template>
  <pop-wrap padding="0">
    <template slot="header">
      <div class="app-header">
        <div class="left">
          <back />
          <div class="info">
            <span>完成：{{completed}}</span>
            <span>剩余：{{remaining}}</span>
          </div>
        </div>
        <time>
          {{ $util.timeFormat(time) }}
        </time>
      </div>
    </template>
    <template>
      <div
        v-if="load"
        class="app-content"
      >
        <router-view @next="next"></router-view>
      </div>
      <div
        v-if="!load"
        class="load-message"
      >
        loading...
      </div>
    </template>
  </pop-wrap>
</template>
<script>
import { mapActions, mapMutations, mapState } from "vuex";
export default {
  data: () => ({
    load: false,
    completed: 0,
    remaining: 0,
    time: 0
  }),
  mounted() {
    if (!this.english.book_id) {
      return this.exit("没有选中单词本！");
    }
    this.getData().then(() => {
      if (!this.review.total) {
        return this.exit("单词数量为空！");
      }
      this.start();
      this.remaining = this.review.total;
    });
  },
  destroyed() {
    this.$util.timer.remove("reviewing_timer");
  },
  methods: {
    ...mapActions({
      getData: "getReview"
    }),
    ...mapMutations(["updateSubmit"]),
    exit(msg) {
      this.$util.msg.error(msg).then(() => {
        this.$router.back();
      });
    },
    start() {
      this.load = true;
      this.$util.timer.add("reviewing_timer", 60).update(() => {
        this.time++;
      });
    },
    next() {
      this.completed++;
      this.remaining--;
      if (!this.remaining) {
        this.success();
      }
    },
    success() {
      this.updateSubmit({
        time: Math.floor(this.time / this.review.total),
        total: this.review.total,
        review_module: this.$route.meta.title
      });
      this.$router.push("/submit");
    }
  },
  computed: {
    ...mapState(["review", "english"])
  }
};
</script>

<style lang="scss" scoped>
.app-content {
  @include flex-column;
  justify-content: space-between;
  flex: 1;
}
.info {
  margin-left: 5vw;
  @include flex-column;
  font-size: 0.8rem;
}
.load-message {
  @include size(100%);
  @include sub-center;
}
</style>
