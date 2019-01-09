<template>
  <reviewing ref="reviewing">
    <div class="problem">
      <p class="chinese">{{problem.chinese}}</p>
      <p class="english">
        <span
          v-for="(item,index) in problem.english"
          :key="index"
          :class="hasError(index)"
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
      blank: "_",
      index: 0,
      blankIndexes: [],
      enteredIndexes: [],
      problem: {
        chinese: "",
        english: []
      },
      origin: {}
    };
  },
  watch: {
    index(val) {
      if (val < this.list.length) {
        this.initProblem();
      }
    }
  },
  mounted() {
    this.initProblem();
  },
  methods: {
    initProblem() {
      const index = this.index;
      this.origin = this.list[index];
      this.problem = {
        ...this.origin,
        english: this.origin.english.split("")
      };
      this.setBlankindex();
      this.initEnglish();
    },
    setBlankindex() {
      this.blankIndexes = [];
      const len = this.problem.english.length;
      let n = Math.floor(len / 1.2);
      while (n--) {
        while (true) {
          const index = this.$util.random(0, len);
          if (!this.blankIndexes.includes(index)) {
            this.blankIndexes.push(index);
            break;
          }
        }
      }
    },
    initEnglish() {
      this.enteredIndexes = [];
      this.blankIndexes.forEach(index => this.setBlank(index));
    },
    setBlank(index) {
      this.setKey(index, this.blank);
    },
    setKey(index, key) {
      this.problem.english.splice(index, 1, key);
    },
    keyboard(key) {
      switch (key) {
        case "delete":
          this.delete();
          break;
        default:
          this.enter(key);
          break;
      }
    },
    delete() {
      if (!this.enteredIndexes.length) return;
      const index = this.enteredIndexes.pop();
      this.setBlank(index);
    },
    enter(key) {
      const index = this.currentEnterIndex;
      if (index === -1) return;
      this.setKey(index, key);
      this.enteredIndexes.push(index);
      setTimeout(() => {
        if (this.currentEnterIndex === -1) {
          this.verify();
        }
      }, 300);
    },
    verify() {
      if (this.problem.english.join("") === this.origin.english) {
        this.next();
      } else {
        this.initEnglish();
      }
    },
    hasError(index) {
      const item = this.problem.english[index];
      const origin = this.origin.english[index];
      if (item === this.blank) return;
      if (item !== origin) return "error";
    },
    next() {
      this.index++;
      this.reviewing.next();
    }
  },
  computed: {
    reviewing() {
      return this.$refs.reviewing;
    },
    list() {
      return this.$store.state.review.list;
    },
    currentEnterIndex() {
      return this.problem.english.indexOf(this.blank);
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
    span.error {
      color: $warning-color;
    }
  }
}
</style>
