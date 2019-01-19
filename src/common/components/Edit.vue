<template>
  <modal
    ref="modal"
    :title="title"
    @submit="submit"
    @open="resetData"
  >
    <template slot="btn">
      <el-button
        :style="noMargin ? '' : 'margin:0 10px'"
        size="mini"
        icon="el-icon-edit-outline"
      />
    </template>
    <template slot="body">
      <c-form
        :formItem="$formData[moduleKey].formItem"
        :formData="formData"
      />
    </template>
  </modal>
</template>
<script>
import Modal from "@/common/components/Modal";
import cForm from "@/common/components/Form";
export default {
  components: {
    Modal,
    cForm
  },
  props: {
    title: String,
    moduleKey: String,
    action: String,
    current: Object,
    noMargin : {
      type : Boolean,
      default : false,
    }
  },
  data: () => ({
    formData: null
  }),
  methods: {
    resetData() {
      this.formData = {
        ...this.current
      };
    },
    async submit() {
      if (this.$util.checkEmptyForm(this.formData)) {
        return this.$util.msg.warning("请填写正确！");
      }
      const id = await this.$store.dispatch(this.action, this.formData);
      if (id) {
        this.$util.msg.success("更新成功！");
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>
