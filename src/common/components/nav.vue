<template>
    <ul>
        <li class="nav-item"
            v-for="(item,key) of list"
            :key="key">
            <router-link :to="item.href">{{ item.title }}</router-link>
        </li>
    </ul>
</template>
<script>
export default {
  props: {
    list: Array
  }
}
</script>

<style lang="scss" scoped>
ul {
  height: $nav-height;
  background: $secondary-color;
  @include nav;
}
</style>
