<template>
  <pop-wrap padding="0">
    <template slot="header">
      <div class="app-header">
        <div class="left">
          <back />
          <div class="info">
            <span>完成：80</span>
            <span>剩余：8</span>
          </div>
        </div>
        <time>
          00:44
        </time>
      </div>
    </template>
    <div class="app-content">
      <slot></slot>
    </div>
  </pop-wrap>
</template>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  justify-content: space-between;
  flex: 1;
}
.left {
  @include sub-center;
}
.info {
  margin-left: 5vw;
  @include flex-column;
  font-size: 0.8rem;
}
</style>
