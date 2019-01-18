<template>
  <pop-wrap
    :showSiteTitle="true"
    :useBack="false"
  >
    <div class="app-content">
      <c-form
        :formItem="$formData.adminLogin.formItem"
        :formData="formData"
      />
      <el-button
        type="primary"
        @click="submit"
      >登 录</el-button>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/Form";
import { async } from "q";
import { mapActions } from "vuex";

export default {
  components: {
    cForm
  },
  data: () => ({
    formData: {
      username: "",
      password: ""
    }
  }),
  methods: {
    ...mapActions(["login"]),

    async submit() {
      const { username, password } = this.formData;
      if (!username || !password) {
        return this.$util.msg.warning("请填写完整！");
      }
      await this.login(this.formData);
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
button {
  width: 100%;
}
</style>
