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
        :formItem="$formData.partialSpell.formItem"
        :formData="formData"
      >
      </c-form>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/Form";
import { async } from "q";
import { mapActions, mapState } from "vuex";

export default {
  components: {
    cForm
  },
  data() {
    return {
      formData: {
        partial_spell_proportion: 0
      }
    };
  },
  methods: {
    ...mapActions(["updateSetting", "getSetting"]),
    async submit() {
      if (this.$util.checkEmptyForm(this.formData)) {
        return this.$util.msg.warning("请填写完整！");
      }
      await this.updateSetting(this.formData);
      this.$util.msg.success("修改成功");
    }
  },
  mounted() {
    this.getSetting().then(() => {
      const { partial_spell_proportion } = this.setting;
      this.formData = {
        partial_spell_proportion
      };
    });
  },
  computed: {
    ...mapState(["setting"])
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  justify-content: center;
}
</style>
