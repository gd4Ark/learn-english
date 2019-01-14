<template>
  <wrap>
    <div class="app-content">
      <div class="learn-modules">
        <div
          class="review_module"
          v-for="(item,index) in review_modules"
          :key="index"
          @click="toLearnModule(item.review_module)"
        >
          <h2 class="title">{{item.title}}</h2>
        </div>
      </div>
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data: () => ({
    review_modules: [
      {
        title: "单词部分拼写",
        review_module: "/partial_spell"
      }
    ]
  }),
  methods: {
    toLearnModule(route) {
      this.$router.push("/reviewing" + route);
    }
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  overflow-y: auto;
  .learn-modules {
    padding: 1% 2%;
    @include flex;
    flex-wrap: wrap;
    justify-content: space-between;
    .review_module {
      @include sub-center;
      margin: 1vh 0;
      width: 45%;
      min-height: 150px;
      background: white;
      border-radius: 5px;
      h2 {
        font-size: 0.8rem;
      }
    }
  }
}
</style>