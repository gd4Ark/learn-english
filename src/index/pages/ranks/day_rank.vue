<template>
    <rank :data="$store.state.dayRank"></rank>
</template>
<script>
import Rank from '@/index/components/rank'
export default {
  components: {
    Rank
  },
  mounted() {
    this.$store.dispatch('refreshDayRank')
  }
}
</script>
