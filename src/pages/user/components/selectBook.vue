<template>
  <modal
    ref="modal"
    title="选择单词本"
    @open="open"
    @submit="submit"
  >
    <template slot="btn">
      <el-button icon="el-icon-tickets">选择单词本</el-button>
    </template>
    <template slot="body">
      <el-select
        v-model="value"
        value-key="id"
        placeholder="请选择单词本"
      >
        <el-option
          v-for="item in $store.state.book.list"
          :key="item.id"
          :label="item.name"
          :value="item"
        >
        </el-option>
      </el-select>
    </template>
  </modal>
</template>
<script>
import modal from "@/common/components/modal";
import { mapMutations } from "vuex";
export default {
  components: {
    modal
  },
  data() {
    return {
      value: ""
    };
  },
  methods: {
    ...mapMutations({
      updateCurrent: "updateBook",
      updateBookId : "updateEnglish",
    }),
    open() {
      this.value = this.$store.state.book.current;
    },
    async submit() {
      this.updateBookId({
        book_id: this.value.id,
      });
      this.updateCurrent({
        current: this.value
      });
      this.$refs.modal.hidden();
    }
  }
};
</script>
<style lang="scss" scoped>
button {
  margin-top: 12vh;
  width: 100%;
}
</style>
