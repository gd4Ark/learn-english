<template>
  <pop-wrap>
    <div class="app-header">
      <router-link to="/"
                   class="back"></router-link>
      <h2 class="title">提交信息</h2>
    </div>
    <div class="submit-container">
      <h4 class="title">{{ showTime }}</h4>
      <div class="form-group">
        <label for="#name">姓名：</label>
        <input id="name"
               type="text"
               class="form-input"
               placeholder="请输入您的姓名"
               v-model="name">
      </div>
      <button class="submit-btn big-btn"
              @click="submit">提交</button>
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
      if (!this.$store.state.time) {
        return this.$router.push('/')
      }
      const verify = [/\s/.test(this.name), !this.name]
      if (verify.includes(true)) {
        return alert('请输入正确的姓名！')
      }
      this.$store.dispatch('submit', this.name).then((data) => {
        this.$router.push('/')
      })
    }
  },
  computed: {
    showTime() {
      return this.utils.timeFormat(this.$store.state.time)
    }
  }
}
</script>
