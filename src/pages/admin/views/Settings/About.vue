<template>
  <pop-wrap
    v-if="$route.name === 'setting/about'"
    padding="0"
  >
    <div class="app-content">
      <div class="header">
        <img
          class="logo"
          :src="logo"
          alt="logo"
        >
        <h1>{{ $config.title }}</h1>
        <p>V {{ $config.version }}</p>
      </div>
      <div class="content">
        <Menu :optionsGroups="optionsGroups" />
      </div>
      <div class="footer">
        Copyright &copy; 2019 4Ark. All Rights Reserved.
      </div>
    </div>
  </pop-wrap>
  <router-view v-else></router-view>
</template>
<script>
import logo from "@/common/img/logo.png";
import Menu from "@/common/components/Menu";
export default {
  components: {
    Menu
  },
  data: () => ({
    logo,
    optionsGroups: [
      [
        {
          path: "/setting/about/log",
          label: "更新日志管理"
        },
        {
          path: "/setting/about/app",
          label: "关于清技背单词"
        },
        {
          path: "/setting/about/we",
          label: "关于开发者"
        }
      ]
    ]
  })
};
</script>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  align-items: center;
  > * {
    width: 100%;
    text-align: center;
  }
  .header {
    margin-top: 10%;
    height: 30%;
    .logo {
      width: 80px;
      height: 80px;
    }
    h1 {
      margin-top: 5%;
      font-size: 1.2rem;
    }
    p {
      margin: 2%;
    }
  }
  .content {
    flex: 1;
  }
  .footer {
    @include sub-center;

    font-size: 0.8rem;
    height: 30px;
  }
}
</style>
