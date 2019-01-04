<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>
<script>
import { mapActions } from "vuex";

export default {
  created() {
    // this.resetProductSearchData();
    // this.resetOrderSearchData();
    // this.resetIncomeSearchData();
  },
  methods: {
    // ...mapActions([
    //   "resetProductSearchData",
    //   "resetOrderSearchData",
    //   "resetIncomeSearchData",
    // ])
  }
};
</script>
<style lang="scss">
@import "@/common/styles/reset.scss";
</style>
