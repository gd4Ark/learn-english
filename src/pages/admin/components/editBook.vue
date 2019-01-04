<template>
  <modal
    ref="modal"
    title="编辑单词本"
    @submit="submit"
    @open="resetData"
  >
    <template slot="btn">
      <el-button
        style="margin:0 10px"
        size="mini"
        icon="el-icon-edit-outline"
      ></el-button>
    </template>
    <template slot="body">
      <c-form
        :formItem="$runtime_data.book.formItem"
        :formData="formData"
      />
    </template>
  </modal>
</template>
<script>
import modal from "@/common/components/modal";
import cForm from "@/common/components/form";
import { mapActions } from "vuex";
export default {
  data() {
    return {
      formData: null
    };
  },
  props: {
    current: Object
  },
  components: {
    modal,
    cForm
  },
  methods: {
    ...mapActions(["updateBook"]),
    resetData() {
      this.formData = {
        ...this.current
      };
    },
    async submit() {
            if (!this.$util.verifForm(this.formData)){
        return this.$util.msg_error("请填写正确！");
      }
      const id = await this.updateBook(this.formData);
      if (id) {
        this.$util.msg_success("更新成功！");
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>
