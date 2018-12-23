<template>
    <div class="learning-container"
         v-if="inner_list.length !== 0">
        <div class="problem">
            <transition-group name="slide" tag="ul">
                <li v-for="(item,index) of inner_list"
                    :key="item.id"
                    class="slide-item"
                    v-show="index===0">
                    <p class="text chinese">{{ item.chinese }}</p>
                    <div :class="['english','text']">
                        <p v-if="index === 0"
                           :class="[{'error' : errorStatus }]"
                           ref="english_tag">
                            <span v-for="(item,index,key) of currentEnglish"
                                  :key="key"
                                  :class="{'error' : hasError(index,item)}">{{item}}</span>
                        </p>
                        <p v-else>
                            {{ item.english }}
                        </p>
                    </div>
                </li>
            </transition-group>
        </div>
        <keyboard @keydown="input" ref="keyboard"></keyboard>
    </div>
</template>
<script>
import Keyboard from '@/index/components/keyboard'
export default {
  data() {
    return {
      inner_list: [],
      currentEnglish: [],
      inputedIndex: [],
      errorStatus: false
    }
  },
  props: {
    list: {
      type: Array,
      default: []
    },
    currentProblem: Number,
    proportion: Number,
  },
  components: {
    Keyboard
  },
  watch: {
    list() {
      this.updateListed()
    },
    currentProblem(v, t) {
      this.inner_list.shift()
      this.adjustEnglish()
    }
  },
  mounted() {
    this.updateListed()
    this.adjustEnglish()
  },
  methods: {
    updateListed() {
      this.inner_list = [...this.list]
    },
    randomNums(english) {
      const len = english.length
      const nums = []
      let count = Math.floor(len * this.proportion)
      while (count) {
        while (true) {
          const num = this.utils.random(0, len)
          if (!nums.includes(num) && english[num] !== " ") {
            nums.push(num)
            break
          }
        }
        count--
      }
      return nums
    },
    adjustEnglish() {
      this.inputedIndex = []
      const english = this.inner_list[0].english
      const adjust = english.split('')
      const nums = this.randomNums(adjust)
      nums.map(el => {
        adjust[el] = '_'
      })
      this.errorStatus = false
      this.currentEnglish = adjust
    },
    resetEnglish() {
      while (this.inputedIndex.length) {
        this.del()
      }
      this.errorStatus = false
    },
    getCurrentPos() {
      return this.currentEnglish.indexOf('_')
    },
    getCurrentEnglish() {
      return this.inner_list[0].english
    },
    inputed() {
      const correct = this.currentEnglish.join('') === this.getCurrentEnglish()
      if (!correct) {
        this.errorStatus = true
        const tag = this.$refs.english_tag[0]
        this.utils.on(tag, 'animationend', () => {
          this.resetEnglish()
        })
        return
      }
      setTimeout(() => {
        this.$emit('next');
      }, 200)
    },
    del() {
      if(this.inputedIndex.length === 0)return;
      const index = this.inputedIndex.pop()
      this.currentEnglish.splice(index, 1, '_')
    },
    input(key) {
      if(key === "caseChange"){
        this.$refs.keyboard.caseChange();
        return;
      }else if (key === 'del') {
        this.del()
        return
      }
      const index = this.getCurrentPos()
      if (index === -1) {
        return
      }
      this.inputedIndex.push(index)
      this.currentEnglish.splice(index, 1, key)
      if (this.getCurrentPos() === -1) {
        return this.inputed()
      }
    }
  },
  computed: {
    hasError() {
      return (index, item) => {
        const english = this.getCurrentEnglish()[index]
        return item !== '_' && english !== item
      }
    }
  },
  created(){
    document.onkeydown = e => {
      if(e.keyCode >= 65 && e.keyCode <= 90){
        this.input(e.key)
      }else if(e.keyCode === 8){
        this.del()
      }
    }
  },
  destroyed(){
    document.onkeydown = null
  }
}
</script>
<style lang="scss" scoped>
.learning-container {
  @include size(100%);
  display: flex;
  flex-direction: column;
}
.problem {
  position: relative;
  flex: 1;
  text-align: center;
  overflow: hidden;
  ul {
    position: absolute;
    @include size(100%);
    li {
      position: absolute;
      @include size(100%);
    }
  }
  .text {
    line-height: 6;
    & p.error {
      animation: shake 0.3s ease;
    }
    &.chinese {
      font-size: 1.8rem;
    }
    &.english {
      font-size: 1.6rem;
    }
    span.error {
      color: red;
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
}
</style>
