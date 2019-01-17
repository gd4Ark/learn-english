<template>
  <pop-wrap>
    <div class="app-content">
      <img
        class="logo"
        :src="logo"
        alt="logo"
      >
      <h1>{{ $config.title }}</h1>
      <p>V 0.2.2</p>
    </div>
  </pop-wrap>
</template>
<script>
import logo from "@/common/img/logo.png";
export default {
  data: () => ({
    logo
  })
};
</script>
<style lang="scss" scoped>
.app-content {
  padding-top: 15%;
  text-align: center;
  h1 {
    margin-top: 5%;
    font-size: 1.2rem;
  }
  p{
      margin: 2%;
  }
}
.logo {
  width: 80px;
  height: 80px;
}
</style>
