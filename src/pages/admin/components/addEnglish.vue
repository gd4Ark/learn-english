<template>
  <modal
    ref="modal"
    title="添加单词"
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
        :formItem="$runtime_data.english.formItem"
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
  components: {
    modal,
    cForm
  },
  mounted() {
    this.resetData();
  },
  methods: {
    ...mapActions(["addEnglish"]),
    resetData() {
      this.formData = this.$runtime_data.english.formData();
    },
    async submit() {
      if (!this.$util.verifForm(this.formData)){
        return this.$util.msg_error("请填写正确！");
      }
      const id = await this.addEnglish({
        ...this.formData,
        book_id : this.$store.state.english.book_id,
      });
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