<template>
  <pop-wrap>
    <div class="app-content">
      <div class="message">
        <p>
          清技背单词是一款复习单词的 Web 应用，主要由教师提供单词，
          学生进行多项模块复习，并以完成每个单词的平均时间作为成绩进行排名，
          致力于提高学生的学习兴趣、课外复习的自主性。
        </p>
        <p>
          本项目在 GitHub 开放源代码，如有兴趣请点击以下链接：
          <a href="https://github.com/gd4Ark/learn_english">
            https://github.com/gd4Ark/learn_english
          </a> 。
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

