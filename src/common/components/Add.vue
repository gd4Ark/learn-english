<template>
  <modal
    ref="modal"
    :title="title"
    @submit="submit"
  >
    <template slot="btn">
      <el-button
        size="mini"
        type="primary"
        icon="el-icon-plus"
      />
    </template>
    <template slot="body">
      <baseForm
        ref="baseForm"
        :formItem="formItem"
        :getFormData="getFormData"
        @submit="handleSubmit"
      />
    </template>
  </modal>
</template>
<script>
import modal from "@/common/components/Modal";
import BaseForm from "@/common/components/BaseForm";
export default {
  components: {
    modal,
    BaseForm
  },
  props: {
    formItem: Array,
    getFormData: Function,
    title: String,
    action: String,
  },
  methods: {
    submit() {
      this.$refs.baseForm.submit();
    },
    async handleSubmit(formData) {
      if (!this.action) {
        return this.$emit("submit", formData);
      }
      const id = await this.$store.dispatch(this.action, formData);
      if (id) {
        this.$util.msg.success("添加成功！");
        this.$refs.baseForm.reset();
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>