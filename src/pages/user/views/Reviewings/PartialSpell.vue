<template>
  <div class="content">
    <div class="problem">
      <p class="chinese">{{problem.chinese}}</p>
      <p
        :class="['english',{'error' : errorStatus}]"
        ref="english_tag"
      >
        <span
          v-for="(item,index) in problem.english"
          :key="index"
          :class="hasError(index)"
        >{{item}}</span>
      </p>
    </div>
    <keyboard @keydown="keyboard"></keyboard>
  </div>
</template>

<script>
import { mapState } from "vuex";
import Keyboard from "@/pages/user/components/Keyboard";
export default {
  components: {
    Keyboard,
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
      origin: {},
      errorStatus: false
    };
  },
  watch: {
    index(val) {
      if (val < this.review.list.length) {
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
      this.origin = this.review.list[index];
      this.problem = {
        ...this.origin,
        english: this.origin.english.split("")
      };
      this.setBlankindex();
      this.initEnglish();
    },
    setBlankindex() {
      this.blankIndexes = [];
      const len = this.problem.english.filter(el => el !== " ").length;
      let n = Math.floor(len / 1.2);
      while (n--) {
        while (true) {
          const index = this.$util.random(0, len);
          if (
            this.problem.english[index] !== " " &&
            !this.blankIndexes.includes(index)
          ) {
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
      if (this.currentEnterIndex === -1) {
        setTimeout(() => {
          this.verify();
        }, 200);
      }
    },
    verify() {
      if (this.problem.english.join("") === this.origin.english) {
        this.next();
      } else {
        const tag = this.$refs.english_tag;
        this.errorStatus = true;
        this.$util.on(tag, "animationend", () => {
          this.errorStatus = false;
          this.initEnglish();
        });
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
      this.$emit("next");
    }
  },
  computed: {
    currentEnterIndex() {
      return this.problem.english.indexOf(this.blank);
    },
    ...mapState({
      review: "review"
    })
  }
};
</script>
<style lang="scss" scoped>
.content {
  @include flex-column;
  justify-content: space-between;
  flex: 1;
}
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
    &.error {
      animation: shake 0.3s ease;
    }
    span.error {
      color: $warning-color;
    }
  }
}
@keyframes shake {
  0%,
  100% {
    -webkit-transform: translateX(0);
  }
  10%,
  30%,
  50%,
  70%,
  90% {
    -webkit-transform: translateX(-10px);
  }
  20%,
  40%,
  60%,
  80% {
    -webkit-transform: translateX(10px);
  }
}
</style>
