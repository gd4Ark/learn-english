<template>
  <i
    @click="back"
    class="el-icon-back"
  ></i>
</template>
<script>
export default {
  props: {
    backStep: {
      type: Number,
      default: 1
    }
  },
  methods: {
    back() {
      history.length <= 2
        ? this.$router.push({ path: "/" })
        : this.$router.go(-this.backStep);
    }
  }
};
</script>
