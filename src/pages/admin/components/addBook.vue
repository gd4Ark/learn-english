<template>
  <modal
    ref="modal"
    title="添加单词本"
    @submit="submit"
  >
    <template slot="btn">
      <el-button
        size="mini"
        type="primary"
        icon="el-icon-plus"
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
    ...mapActions(["addBook"]),
    resetData() {
      this.formData = this.$runtime_data.book.formData();
    },
    async submit() {
      if (!this.$util.verifForm(this.formData)) {
        return this.$util.msg_error("请填写正确！");
      }
      const id = await this.addBook(this.formData);
      if (id) {
        this.$util.msg_success("添加成功！");
        this.resetData();
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  }
};
</script>