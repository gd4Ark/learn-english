<template>
  <wrap>
    <div id="login">
      <h2 class="title">登录</h2>
      <div class="container">
        <div class="form-group">
          <input type="text"
                 class="form-input"
                 v-model="name"
                 placeholder="请输入用户名">
        </div>
        <div class="form-group">
          <input type="password"
                 class="form-input"
                 v-model="pass"
                 placeholder="请输入密码">
        </div>
        <button class="big-btn mt-btn principal-btn"
                @click="submit">登录</button>
      </div>
    </div>
  </wrap>
</template>
<script>
import Wrap from '@/common/layouts/pop_wrap'
export default {
  data() {
    return {
      name: '',
      pass: ''
    }
  },
  components: {
    Wrap
  },
  methods: {
    submit() {
      const { name, pass } = this
      if (!name || !pass) {
        return
      }
      this.$store
        .dispatch('userLogin', {
          name,
          pass
        })
        .then(() => {
          this.$router.push('/')
        })
    }
  }
}
</script>
<style lang="scss" scoped>
#login {
  background: $principal-color;
  @include size(100%);
  @include padding;
  @include flex-column;
  align-items: center;
}
.container {
  flex: 1;
  @include size(100%);
  @include flex-column;
  // justify-content: center;
}
.form-group {
  margin-top: 40px;
}
.mt-btn {
  margin-top: 40px;
}
</style>
