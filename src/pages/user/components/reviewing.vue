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
          00:44
        </time>
      </div>
    </template>
    <template>
      <div
        v-if="load"
        class="app-content"
      >
        <slot @success="success"></slot>
      </div>
    </template>
  </pop-wrap>
</template>
<script>
import { mapActions } from "vuex";
export default {
  data: () => ({
    load: false,
    completed: 0,
    remaining: 0,
    time: 0
  }),
  mounted() {
    this.getData().then(() => {
      setTimeout(() => {
        this.load = true;
      }, 200);
      this.remaining = this.$store.state.review.total;
    });
  },
  methods: {
    ...mapActions({
      getData: "getReview"
    }),
    success() {
      this.$router.push('/submit');
    },
    next() {
      this.completed++;
      this.remaining--;
      if (!this.remaining) {
        this.success();
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.app-content {
  @include flex-column;
  justify-content: space-between;
  flex: 1;
}
.left {
  @include sub-center;
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
