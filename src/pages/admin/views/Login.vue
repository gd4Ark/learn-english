<template>
  <pop-wrap
    :showSiteTitle="true"
    :useBack="false"
  >
    <div class="app-content">
      <BaseForm
        btn="登录"
        :useBtn="true"
        :formItem="$v_data.login.base.item"
        :getFormData="$v_data.login.base.data"
        @submit="submit"
      />
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
    ...mapActions(["login"]),
    async submit(data) {
      await this.login(data);
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
