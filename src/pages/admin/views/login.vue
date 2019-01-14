<template>
  <pop-wrap :useBack="false">
    <div class="app-content">
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
</style>
