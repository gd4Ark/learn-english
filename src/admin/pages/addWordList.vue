<template>
  <pop-wrap>
    <div class="app-header">
      <router-link to="/index"
                   class="back"></router-link>
      <h2 class="title">添加单词本</h2>
    </div>
    <div class="submit-container">
      <div class="form-group">
        <input id="name"
               type="text"
               class="form-input"
               placeholder="请输入单词本姓名"
               v-model="name">
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
      name: ''
    }
  },
  components: {
    PopWrap
  },
  methods: {
    submit() {
      const verify = [/\s/.test(this.name), !this.name]
      if (verify.includes(true)) {
        return alert('请输入正确的名字！')
      }
      this.$store.dispatch('addWordBook', this.name).then(() => {
        this.$router.push('/')
      })
    }
  }
}
</script>