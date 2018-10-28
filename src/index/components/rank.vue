<template>
    <appear-animate>
        <div class="rank-container">
            <template v-if="data.length === 0">
                <div class="empty-rank-message">
                    <p>
                        :)暂时还没有人在榜上哦，赶紧开始学习来打榜吧
                    </p>
                </div>
            </template>
            <template v-else>
                <table class="scroll-table">
                    <thead>
                        <tr>
                            <th>名次</th>
                            <th>姓名</th>
                            <th>速度</th>
                        </tr>
                    </thead>
                    <transition-group name="list-complete"
                                      tag="tbody">
                        <tr v-for="(item,index) of data"
                            :key="item.id"
                            class="list-complete-item">
                            <td>{{ showNum(index+1) }}</td>
                            <td class="text">{{ item.name }}</td>
                            <td class="text">{{ showTime(item.time) }}</td>
                        </tr>
                    </transition-group>
                </table>
            </template>
        </div>
    </appear-animate>
</template>
<script>
import AppearAnimate from '@/common/components/appear_animate'
export default {
  props: {
    data: Array
  },
  components: {
    AppearAnimate
  },
  computed: {
    showNum() {
      return num => this.utils.numFormat(num)
    },
    showTime() {
      return time => this.utils.timeFormat(time)
    }
  }
}
</script>
<style lang="scss" scoped>
.rank-container {
  @include size(100%);
}
.empty-rank-message {
  padding: 20% 5%;
  text-align: center;
  p {
    display: inline-block;
    font-size: 1rem;
    text-align: left;
  }
}
</style>
