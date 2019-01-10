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
