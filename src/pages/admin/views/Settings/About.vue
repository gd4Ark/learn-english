<template>
  <pop-wrap padding="0">
    <div class="app-content">
      <img
        class="logo"
        :src="logo"
        alt="logo"
      >
      <h1>{{ $config.title }}</h1>
      <p>V {{ $config.version }}</p>
      <Menu :optionsGroups="optionsGroups" />
    </div>
  </pop-wrap>
</template>
<script>
import logo from "@/common/img/logo.png";
import Menu from "@/common/components/Menu";
export default {
  components : {
    Menu
  },
  data: () => ({
    logo,
    optionsGroups: [
      [
        {
          path: "/setting/password",
          label: "单词部分拼写"
        }
      ]
    ]
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
