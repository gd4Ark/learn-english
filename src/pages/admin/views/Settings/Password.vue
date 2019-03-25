<template>
  <pop-wrap>
    <template slot="header-right">
      <el-button size="small"
                 type="primary"
                 @click="submit">完 成</el-button>
    </template>
    <div class="app-content">
      <base-form ref="baseForm"
                 :formItem="$v_data.password.update.item"
                 :getFormData="$v_data.password.update.data"
                 @submit="handleSubmit">
      </base-form>
    </div>
  </pop-wrap>
</template>
<script>
import BaseForm from "@/common/components/BaseForm";
import { mapActions } from "vuex";

export default {
  components: {
    BaseForm
  },
  methods: {
    ...mapActions(["updatePassword"]),
    submit() {
      this.$refs.baseForm.submit();
    },
    async handleSubmit(data) {
      const { new_password, new_password2 } = data;
      if (new_password !== new_password2) {
        return this.$util.msg.warning("新密码不一致！");
      }
      await this.updatePassword(data);
      this.$router.push("/setting/logout");
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
