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
      <base-form
        v-if="done"
        ref="baseForm"
        :formItem="$vData.review.partialSpell.item"
        :formData="formData"
        @submit="handleSubmit"
      >
      </base-form>
    </div>
  </pop-wrap>
</template>
<script>
import BaseForm from "@/common/components/BaseForm";
import { mapActions, mapState } from "vuex";

export default {
  components: {
    BaseForm
  },
  data: () => ({
    formData: {
      partial_spell_proportion : null
    }
  }),
  methods: {
    ...mapActions(["updateSetting", "getSetting"]),
    submit() {
      this.$refs.baseForm.submit();
    },
    async handleSubmit(formData) {
      await this.updateSetting(formData);
      this.$util.msg.success("修改成功");
    }
  },
  async mounted() {
    await this.getSetting();
    const { partial_spell_proportion  } = this.setting;
    this.formData = {
      partial_spell_proportion 
    };
  },
  computed: {
    ...mapState(["setting"]),
    done(){
      return this.formData.partial_spell_proportion  !== null;
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
