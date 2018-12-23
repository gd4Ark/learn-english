<template>
    <pop-wrap>
        <div id="learning">
            <div class="app-header">
                <div class="info">
                    <router-link class="back"
                                 to="/">
                    </router-link>
                    <div class="count-info">
                        <p>
                            <span>完成</span>
                            <span>{{ complete_count }}</span>
                        </p>
                        <p>
                            <span>剩余</span>
                            <span>{{ remaining_count }}</span>
                        </p>
                    </div>
                </div>
                <p class="text">{{ showTime }}</p>
            </div>
            <div class="content">
                <router-view :currentProblem="currentProblem"
                             @next="onNext">
                </router-view>
            </div>
        </div>
    </pop-wrap>
</template>
<script>
import PopWrap from '@/common/layouts/pop_wrap'
export default {
  data() {
    return {
      complete_count: 0,
      remaining_count: 0,
      currentProblem: 0,
      time: 0
    }
  },
  watch: {
    currentProblem() {
      this.complete_count++
    },
    complete_count() {
      this.updateRemaining()
    }
  },
  mounted() {
    this.refresh()
  },
  components: {
    PopWrap
  },
  methods: {
      refresh() {
      this.$store.dispatch('refreshWordBook').then(()=>{
        this.start();
      });
    },
    start(){
      this.updateRemaining()
        this.utils.timer.reg('update_time', 60, () => {
        this.time++
      })
    },
    getCount() {
      return this.$store.state.wordBook.count
    },
    submit() {
      this.$store.commit('updateTime', {
        time: this.time
      })
      setTimeout(() => {
        this.$router.push('/submit')
      }, 300)
    },
    onNext() {
      const count = this.getCount()
      if (this.complete_count === count - 1) {
        return this.submit()
      }
      this.currentProblem++
    },
    updateRemaining() {
      const count = this.getCount()
      this.remaining_count = count - this.complete_count
    }
  },
  computed: {
    showTime() {
      return this.utils.timeFormat(this.time)
    }
  }
}
</script>
<style lang="scss" scoped>
#learning {
  @include flex;
  @include size(100%);
  flex-direction: column;
  background: $principal-color;
  .content {
    flex: 1;
  }
  .app-header {
    .info {
      display: flex;
      align-items: center;
      border-radius: 10px 10px 10px 10px;
      > * {
        min-width: 3rem;
      }
      .exit {
        text-align: center;
      }
      .count-info {
        padding-right: 0.5rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        font-size: 0.8rem;
        span + span {
          margin-left: 5px;
        }
      }
    }
  }
}
</style>
