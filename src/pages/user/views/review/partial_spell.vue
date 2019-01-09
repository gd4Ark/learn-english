<template>
  <reviewing ref="reviewing">
    <div class="problem">
      <p class="chinese">{{problem.chinese}}</p>
      <p class="english">
        <span
          v-for="(item,index) in problem.english"
          :key="index"
        >{{item}}</span>
      </p>
    </div>
    <keyboard @keydown="keyboard"></keyboard>
  </reviewing>
</template>

<script>
import reviewing from "@/pages/user/components/reviewing";
import keyboard from "@/pages/user/components/keyboard";
export default {
  components: {
    reviewing,
    keyboard
  },
  data() {
    return {
      index: 0,
      problem: {
        chinese: "",
        english: []
      },
      origin: {}
    };
  },
  watch: {
    index() {
      this.initProblem();
    }
  },
  mounted() {
    this.initProblem();
  },
  methods: {
    initProblem() {
      const index = this.index;
      this.origin = this.$store.state.review.list[index];
      this.problem = {
        ...this.origin,
        english: this.initEnglish()
      };
    },
    initEnglish() {
      const english = this.origin.english.split("");
      const len = english.length;
      let n = Math.floor(len / 2);
      while (n--) {
        while (true) {
          const index = this.$util.random(0, len);
          const current = english[index];
          const notEq = ["_", " "];
          if (!notEq.includes(current)) {
            english[index] = "_";
            break;
          }
        }
      }
      return english;
    },
    keyboard(){
      this.next();
    },
    next(){
      this.index++;
      this.reviewing.next();
    }
  },
  computed: {
    reviewing() {
      return this.$refs.reviewing;
    }
  }
};
</script>
<style lang="scss" scoped>
.problem {
  flex: 1;
  @include flex-column;
  @include sub-center;
  .chinese {
    font-size: 1.8rem;
    margin-bottom: 5vh;
  }
  .english {
    font-size: 1.5rem;
  }
}
</style>
