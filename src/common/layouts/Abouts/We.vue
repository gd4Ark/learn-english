<template>
  <pop-wrap>
    <div class="app-content">
      <div class="message">
        <p>
          作者是清远市技师学院计算机专业的学生，同时也是我校《网站设计与开发》工作室的成员。
        </p>
        <p>
          如果您在此应用上有任何技术上的不解或疑惑，欢迎联系作者。（Wx：d8i66666）
        </p>
        <p>
          作者个人博客：<a href="https://gd4ark.github.io">https://gd4ark.github.io</a>
        </p>
      </div>
    </div>
  </pop-wrap>
</template>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  p {
    & + p {
      margin-top: 2vh;
    }
    line-height: 1.5;
    text-indent: 1em;
    font-size: 0.9rem;
  }
}
</style>
