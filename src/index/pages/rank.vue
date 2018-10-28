<template>
    <wrap>
        <div id="rank">
            <div class="nav">
                <app-nav :list="navList"></app-nav>
            </div>
            <div class="content">
                <router-view>
                </router-view>
            </div>
        </div>
    </wrap>
</template>
<script>
import Wrap from '@/common/layouts/user_wrap'
import AppNav from '@/common/components/nav'
export default {
  data() {
    return {
      navList: [
        {
          title: '日榜',
          href: '/rank/dayRank'
        },
        {
          title: '总榜',
          href: '/rank/totalRank'
        }
      ]
    }
  },
  components: {
    Wrap,
    AppNav
  }
}
</script>
<style lang="scss" scoped>
#rank {
  height: 100%;
  display: flex;
  flex-direction: column;
  .nav {
    border-bottom: 1px solid $line-color;
    ul {
      background: $principal-color;
      height: 50px;
      font-weight: bold;
    }
  }
  .content {
    flex: 1;
    overflow: hidden;
  }
}
</style>

