<template>
    <wrap :navList="navList">
        <slot></slot>
    </wrap>
</template>
<script>
import Wrap from '@/common/layouts/wrap'
export default {
  data() {
    return {
      navList: [
        {
          title: '学习',
          href: '/learn'
        },
        {
          title: '排行榜',
          href: '/rank'
        }
      ]
    }
  },
  components: {
    Wrap
  }
}
</script>
