<template>
  <wrap>
    <div class="index-container">
      <div class="app-header">
        <h1 class="title">清技背单词</h1>
      </div>
      <div class="content">
        <div class="learn-modules">
          <div
            class="module"
            v-for="(item,index) in modules"
            :key="index"
            @click="toLearnModule(item.module)"
          >
            <h2 class="title">{{item.title}}</h2>
          </div>
        </div>
      </div>
    </div>
  </wrap>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      modules: [
        {
          title: "英文部分拼写",
          module: "/partial_spell"
        }
      ]
    };
  },
  methods: {
    toLearnModule(route) {
      this.$router.push(route);
    }
  }
};
</script>
<style lang="scss" scoped>
.index-container {
  @include size(100%);
  @include flex-column;
  .content {
    height: 92%;
    overflow-y: auto;
    .learn-modules {
      padding: 1vh 2vh;
      @include flex;
      flex-wrap: wrap;
      justify-content: space-between;
      .module {
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
}
</style>