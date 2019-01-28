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
      <c-form
        :formItem="$formData[module].formItem"
        :formData="formData"
      />
    </template>
  </modal>
</template>
<script>
import modal from "@/common/components/Modal";
import cForm from "@/common/components/Form";
export default {
  components: {
    modal,
    cForm
  },
  props: {
    title: String,
    module: String,
    action: String
  },
  data: () => ({
    formData: null
  }),
  mounted() {
    this.resetData();
  },
  methods: {
    resetData() {
      this.formData = this.$formData[this.module].formData();
    },
    async submit() {
      if (this.$util.checkEmptyForm(this.formData)) {
        return this.$util.msg.warning("请填写正确！");
      }
      const id = await this.$store.dispatch(this.action, this.formData);
      if (id) {
        this.$util.msg.success("添加成功！");
        this.resetData();
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>