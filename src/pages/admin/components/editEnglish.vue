<template>
  <modal
    ref="modal"
    title="编辑单词"
    @submit="submit"
    @open="resetData"
  >
    <template slot="btn">
      <el-button
        size="mini"
        icon="el-icon-edit-outline"
      ></el-button>
    </template>
    <template slot="body">
      <c-form
        :formItem="$formData.english.formItem"
        :formData="formData"
      />
    </template>
  </modal>
</template>
<script>
import Modal from "@/common/components/Modal";
import cForm from "@/common/components/Form";
import { mapActions } from "vuex";
export default {
  components: {
    Modal,
    cForm
  },
  data: () => ({
    formData: null
  }),
  props: {
    current: Object
  },
  methods: {
    ...mapActions(["updateEnglish"]),
    resetData() {
      this.formData = {
        ...this.current
      };
    },
    async submit() {
      if (!this.$util.verifForm(this.formData)) {
        return this.$util.msg.warning("请填写正确！");
      }
      const id = await this.updateEnglish(this.formData);
      if (id) {
        this.$util.msg.success("更新成功！");
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>
