<template>
  <div class="user-wrapper">
    <div class="content">
      <transition name="el-fade-in">
        <router-view v-show="load" />
      </transition>
    </div>
    <footer class="footer">
      {{ $config.app_copyright }}
    </footer>
  </div>
</template>
<script>
export default {
    data: () => ({
        load: false
    }),
    mounted() {
        this.load = true
    }
}
</script>
<style lang="scss" scoped>
.user-wrapper {
    @include flex-column;
    @include wh(100%);
    .content {
        flex: 1;
        overflow: hidden;
    }
    .footer {
        text-align: center;
        line-height: 3.5;
        color: rgb(102, 102, 102);
    }
}
</style>
