<template>
  <pop-wrap>
    <div class="app-header">
      <router-link to="/wordList"
                   class="back"></router-link>
      <h2 class="title">添加单词</h2>
    </div>
    <div class="submit-container">
      <p><span>{{ $store.state.wordBook.title }}</span></p>
      <div class="form-group">
        <textarea id="english"
                  class="form-input"
                  :placeholder="addMessage"
                  v-model="englishs"></textarea>
      </div>
      <button class="submit-btn big-btn"
              @click="submit">添加</button>
    </div>
  </pop-wrap>
</template>
<script>
import PopWrap from '@/common/layouts/pop_wrap'
export default {
  data() {
    return {
      englishs: '',
      addMessage: `格式说明：\n
            red = 红色\n
            apple = 苹果\n
            注：一个单词占一行
            `
    }
  },
  components: {
    PopWrap
  },
  mounted() {
    this.$store.dispatch('refreshWordBook')
  },
  methods: {
    submit() {
      const englishs = this.englishs
      if (!englishs) return
      if (!this.verify(englishs)) return
      this.$store.dispatch('addEnglish', englishs).then(() => {
        this.englishs = ''
      })
    },
    verify(englishs) {
      const arr = englishs.split('\n').filter(v => v)
      const _verify = str => {
        return str !== '' && !/^[ ]+$/.test(str)
      }
      const result = arr.every(v => {
        const a = v.split('=')
        return a[1] && a.every(v => _verify(v))
      })
      return result
    }
  }
}
</script>
