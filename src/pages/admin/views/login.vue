<template>
  <pop-wrap>
    <div id="login">
      <div class="app-header">
        <h1 class="title">{{ $route.meta.title }}</h1>
      </div>
      <div class="container">
        <c-form
          :formItem="$runtime_data.adminLogin.formItem"
          :formData="formData"
        >
          <el-col :offset="9">
            <el-button
              type="primary"
              @click="submit"
            >登 录</el-button>
          </el-col>
        </c-form>
      </div>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/form";
import { async } from "q";
import { mapActions } from "vuex";

export default {
  data() {
    return {
      formData: {
        username: "",
        password: ""
      }
    };
  },
  components: {
    cForm
  },
  methods: {
    ...mapActions(["login"]),

    async submit() {
      const { username, password } = this.formData;
      if (!username || !password) {
        return this.$util.msg_error("请填写完整！");
      }
      const response = await this.login(this.formData);
      this.$router.push("/index");
    }
  },
};
</script>
<style lang="scss" scoped>
#login {
  background: $principal-color;
  @include size(100%);
  @include flex-column;
  align-items: center;
}
.container {
  @include padding;
  @include size(100%);
  @include flex-column;
  flex: 1;
  justify-content: center;
}
</style>
