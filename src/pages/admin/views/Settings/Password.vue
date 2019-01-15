<template>
  <pop-wrap>
    <template slot="header-right">
      <el-button
        size="small"
        type="primary"
        @click="submit"
      >完 成</el-button>
    </template>
    <div class="app-content">
      <c-form
        :formItem="$formData.updatePassword.formItem"
        :formData="formData"
      >
      </c-form>
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
  data() {
    return {
      formData: {
        old_password: "",
        new_password: ""
      }
    };
  },
  methods: {
    ...mapActions(["login"]),

    async submit() {
      const { username, password } = this.formData;
      if (!username || !password) {
        return this.$util.msg.warning("请填写完整！");
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
