<template>
  <wrap>
    <div class="app-content">
      <div class="learn-modules">
        <div
          class="review_module"
          v-for="(item,index) in review_modules"
          :key="index"
          @click="toModule(item.path)"
        >
          <h2 class="title">{{item.meta.title}}</h2>
        </div>
      </div>
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data: () => ({
    review_modules: []
  }),
  mounted() {
    this.review_modules = this.$router.options.routes.find(
      el => el.path === "/reviewing"
    ).children;
    console.log(this.review_modules);
  },
  methods: {
    toModule(route) {
      this.$router.push("/reviewing/" + route);
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