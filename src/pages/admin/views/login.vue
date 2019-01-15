<template>
  <pop-wrap :useBack="false">
    <div class="app-content">
      <c-form
        :formItem="$runtime_data.adminLogin.formItem"
        :formData="formData"
      >
      </c-form>
      <el-button
        type="primary"
        @click="submit"
      >登 录</el-button>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/form";
import { async } from "q";
import { mapActions } from "vuex";

export default {
  components: {
    cForm
  },
  data() {
    return {
      formData: {
        username: "",
        password: ""
      }
    };
  },
  methods: {
    ...mapActions(["login"]),

    async submit() {
      const { username, password } = this.formData;
      if (!username || !password) {
        return this.$util.msg_warning("请填写完整！");
      }
      const response = await this.login(this.formData);
      this.$router.push("/index");
    }
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  justify-content: center;
}
button{
  width: 100%;
}
</style>
