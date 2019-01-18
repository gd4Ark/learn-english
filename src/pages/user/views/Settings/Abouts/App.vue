<template>
  <pop-wrap :showTitle="false">
    <div class="app-content">
      <div class="message">
        <h2>清技背单词</h2>
        <p>
          清技背单词是一款复习单词的 Web 应用，主要由教师提供单词，
          学生进行多项模块复习，并以完成每个单词的平均时间作为成绩进行排名，
          致力于提高学生的学习兴趣、课外复习的自主性。
        </p>
      </div>
    </div>
  </pop-wrap>
</template>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  h2 {
    text-align: center;
    font-weight: normal;
    font-size: 1.2rem;
    margin: 5% 0;
  }
  p {
    text-indent: 1em;
  }
}
</style>
