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
          v-for="item in reviewModules"
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
import ReviewModules from "@/common/mixins/ReviewModules";
import { mapMutations, mapState } from "vuex";
export default {
  mixins: [ReviewModules],
  components: {
    modal
  },
  data: () => ({
    value: ""
  }),
  methods: {
    ...mapMutations({
      updateModule: "updateRank",
    }),
    open() {
      this.value = this.rank.review_module;
    },
    async submit() {
      this.updateModule({
        review_module: this.value
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
