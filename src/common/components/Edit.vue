<template>
  <modal
    ref="modal"
    :title="title"
    @submit="submit"
    @open="reset"
  >
    <template slot="btn">
      <el-button
        :style="noMargin ? '' : 'margin:0 10px'"
        size="mini"
        icon="el-icon-edit-outline"
      />
    </template>
    <template slot="body">
      <baseForm
        ref="baseForm"
        :formItem="formItem"
        :formData="current"
        @submit="handleSubmit"
      />
    </template>
  </modal>
</template>
<script>
import Modal from "@/common/components/Modal";
import BaseForm from "@/common/components/BaseForm";
export default {
  components: {
    Modal,
    BaseForm
  },
  props: {
    title: String,
    formItem: Array,
    action: String,
    current: Object,
    noMargin: {
      type: Boolean,
      default: false
    }
  },
  data: () => ({
    formData: null
  }),
  methods: {
    submit() {
      this.$refs.baseForm.submit();
    },
    reset(){
      // 需要异步执行 否则无法调用 baseForm.reset 方法
      setTimeout(()=>{
        this.$refs.baseForm.reset();
      },0);
    },
    async handleSubmit(formData) {
      if (!this.action) {
        return this.$emit("submit", formData);
      }
      const id = await this.$store.dispatch(this.action, formData);
      if (id) {
        this.$util.msg.success("更新成功！");
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>
