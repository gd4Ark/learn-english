<template>
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
            <i class="el-icon-ali-right1"/>
          </router-link>
        </li>
      </ul>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    optionsGroups: Array
  }
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
    &:active {
      transition: all 0.5s ease;
      background: #d3d6d3;
    }
  }
}
</style>
