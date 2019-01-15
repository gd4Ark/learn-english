<template>
  <wrap
    v-if="$route.name === 'setting' "
    padding="0px"
  >
    <div class="app-content">
      <ul class="option-group-list">
        <li
          class="option-group"
          v-for="(group,index) in optionsGroups"
          :key="index"
        >
          <ul class="option-list">
            <li
              class="option-item"
              v-for="(option,index) in group"
              :key="index"
            >
              <router-link :to="option.path">
                {{option.label}}
                <i class="el-icon-ali-right1"></i>
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </wrap>
  <router-view v-else></router-view>
</template>

<script>
export default {
  data: () => ({
    optionsGroups: [
      [
        {
          path: "/setting/password",
          label: "修改密码"
        }
      ],
      [
        {
          path: "/",
          label: "排行榜设置"
        },
        {
          path: "/",
          label: "复习模块设置"
        }
      ],
      [
        {
          path: "/",
          label: "关于我们"
        },
        {
          path: "/",
          label: "帮助与反馈"
        }
      ],
      [
        {
          path: "/",
          label: "退出"
        }
      ]
    ]
  })
};
</script>
<style lang="scss" scoped>
.option-group-list {
  .option-group {
    margin-bottom: 3vh;
  }
  .option-item a {
    border-bottom: 1px solid $principal-color;
    @include padding;
    @include flex;
    align-items: center;
    justify-content: space-between;
    background: white;
    height: 50px;
    i {
      color: #adadad;
    }
    &:hover {
      transition: all 0.5s ease;
      background: #d3d6d3;
    }
  }
}
</style>
