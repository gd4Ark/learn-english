<template>
  <el-button
    type="text"
    icon="el-icon-back"
    @click="back"
  ></el-button>
</template>
<script>
export default {
  props: {
    backStep: {
      type: Number,
      default: 1
    },
    backPath: {
      type: String,
      default: ""
    }
  },
  methods: {
    back() {
      if (this.backPath) {
        this.$router.push(this.backPath);
        return;
      }
      history.length <= 2
        ? this.$router.push("/")
        : this.$router.go(-this.backStep);
    }
  }
};
</script>
<style lang="scss" scoped>
button{
  width: 10vw;
  color: inherit;
  text-align: left;
}
</style>
