<template>
  <pop-wrap>
    <div class="container">
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
      <div class="content">
        <slot></slot>
      </div>
    </div>
  </pop-wrap>
</template>
<style lang="scss" scoped>
.container {
  @include size(100%);
  @include flex-column;
}
.content {
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
