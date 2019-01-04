<template>
  <ul>
    <li
      class="nav-item"
      v-for="(item,key) of list"
      :key="key"
    >
      <router-link :to="item.href">
        <i v-if="item.icon" :class="item.icon"></i>
        {{ item.title }}
      </router-link>
    </li>
  </ul>
</template>
<script>
export default {
  props: {
    list: Array
  }
};
</script>

<style lang="scss" scoped>
ul {
  height: $nav-height;
  background: $secondary-color;
  @include nav;
  a{
    font-size: 0.8rem;
  }
}
i{
  font-size: 1rem;
  display: block;
  text-align: center;
}
</style>
