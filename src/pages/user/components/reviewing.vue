<template>
  <pop-wrap>
    <div class="app-header">
      <back />
      <time>
        00:44
      </time>
      <div class="info">
        <span>完成：80</span>
        <span>剩余：8</span>
      </div>
    </div>
    <div class="content">
      <slot></slot>
    </div>
  </pop-wrap>
</template>
<style lang="scss" scoped>
.info {
  @include flex-column;
  font-size: 0.8rem;
}
</style>
