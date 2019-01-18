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
        :formItem="$formData.english.formItem"
        :formData="formData"
      />
    </template>
  </modal>
</template>
<script>
import Modal from "@/common/components/Modal";
import cForm from "@/common/components/Form";
import { mapActions, mapState } from "vuex";
export default {
  components: {
    Modal,
    cForm
  },
  data: () => ({
    formData: null
  }),
  mounted() {
    this.resetData();
  },
  methods: {
    ...mapActions(["AddEnglish"]),
    resetData() {
      this.formData = this.$formData.english.formData();
    },
    async submit() {
      if (this.$util.checkEmptyForm(this.formData)) {
        return this.$util.msg.warning("请填写正确！");
      }
      const id = await this.AddEnglish({
        ...this.formData,
        book_id: this.english.book_id
      });
      if (id) {
        this.$util.msg.success("添加成功！");
        this.resetData();
        this.$emit("get-data");
        this.$refs.modal.hidden();
      }
    }
  },
  computed: {
    ...mapState(["english"])
  }
};
</script>