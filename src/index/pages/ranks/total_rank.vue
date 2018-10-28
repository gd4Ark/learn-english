<template>
    <rank :data="$store.state.totalRank"></rank>
</template>
<script>
import Rank from '@/index/components/rank'
export default {
  components: {
    Rank
  },
  mounted() {
    this.$store.dispatch('refreshTotalRank')
  }
}
</script>
