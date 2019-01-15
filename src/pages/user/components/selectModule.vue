<template>
  <modal
    ref="modal"
    title="选择模块"
    @open="open"
    @submit="submit"
  >
    <template slot="btn">
      <el-button type="text">单词部分拼写</el-button>
    </template>
    <template slot="body">
      <el-select
        v-model="value"
        placeholder="请选择模块"
      >
        <el-option
          v-for="item in review_modules"
          :key="item.path"
          :label="item.meta.title"
          :value="item.meta.title"
        >
        </el-option>
      </el-select>
    </template>
  </modal>
</template>
<script>
import modal from "@/common/components/Modal";
import { mapMutations, mapState } from "vuex";
export default {
  components: {
    modal
  },
  data: () => ({
    value: "",
    review_modules : [],
  }),
  mounted(){
    this.review_modules = this.$router.options.routes.find((el)=> el.path === "/reviewing" ).children;
  },
  methods: {
    ...mapMutations({
      updateCurrent: "updateBook",
      updatebook_id: "updateEnglish"
    }),
    open() {
      this.value = this.rank.review_module;
    },
    async submit() {
      this.updatebook_id({
        book_id: this.value
      });
      this.updateCurrent({
        current_id: this.value
      });
      this.$refs.modal.hidden();
    }
  },
  computed: {
    ...mapState(["rank"])
  }
};
</script>
<style lang="scss" scoped>
.option-box {
  @include flex;
  justify-content: space-between;
}
</style>
