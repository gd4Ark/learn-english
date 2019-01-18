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
        old_pass: "",
        new_pass: "",
        new_pass2: "",
      }
    };
  },
  methods: {
    ...mapActions(["updatePassword"]),

    async submit() {
      const { old_pass, new_pass,new_pass2 } = this.formData;
      if (!old_pass || !new_pass || !new_pass2 ) {
        return this.$util.msg.warning("请填写完整！");
      }
      if (new_pass !== new_pass2){
        return this.$util.msg.warning("新密码不一致！");
      }
      await this.updatePassword(this.formData);
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
