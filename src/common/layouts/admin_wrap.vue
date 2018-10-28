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
          title: '单词本',
          href: '/index'
        },
        {
          title: '设置',
          href: '/setting'
        },
      ]
    }
  },
  components: {
    Wrap
  }
}
</script>
