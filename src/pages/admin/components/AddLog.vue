<template>
  <modal
    ref="modal"
    title="添加日志"
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
        :formItem="$formData.log.formItem"
        :formData="formData"
      />
    </template>
  </modal>
</template>
<script>
import modal from "@/common/components/Modal";
import cForm from "@/common/components/Form";
import { mapActions } from "vuex";
export default {
  components: {
    modal,
    cForm
  },
  data: () => ({
    formData: null
  }),
  mounted() {
    this.resetData();
  },
  methods: {
    ...mapActions(["addLog"]),
    resetData() {
      this.formData = this.$formData.log.formData();
    },
    async submit() {
      if (this.$util.checkEmptyForm(this.formData)) {
        return this.$util.msg.warning("请填写正确！");
      }
      const id = await this.addLog(this.formData);
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