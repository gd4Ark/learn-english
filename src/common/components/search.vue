<template>
  <modal
    ref="modal"
    :title="title"
  >
    <template slot="btn">
      <el-button
        size="small"
        type="primary"
        icon="el-icon-search"
        :class="{'has-search':hasSearch}"
      >{{title}}</el-button>
    </template>
    <template slot="body">
      <c-form
        :formData="formData"
        :formItem="formItem"
      />
    </template>
    <template slot="footer">
      <el-button @click="reset">重 置</el-button>
      <el-button
        type="primary"
        @click="submit"
      >确 定</el-button>

    </template>
  </modal>
</template>
<script>
import Modal from "@/common/components/Modal";
import cForm from "@/common/components/Form";
import { mapActions } from "vuex";
export default {
  components: {
    Modal,
    cForm
  },
  props: {
    title: {
      type: String,
      default: "筛选框"
    },
    module: String
  },
  data: () => ({
    keyword: []
  }),
  mounted() {
    this.reset();
  },
  methods: {
    ...mapActions(["resetSearchData", "updateKeyword"]),
    reset() {
      this.resetSearchData(this.module);
    },
    submit() {
      this.keyword = [];
      this.formItem.forEach(el => {
        const key = el.key;
        let item = this.formData[key];
        if (el.items) {
          el.items.forEach((el, index) => {
            if (item[index] !== 0 && !item[index]) return;
            this.keyword.push([key, el.operation, item[index]]);
          });
        } else {
          if (item !== 0 && !item) return;
          const operation = el.operation;
          if (operation === "like") {
            item = `%${item}%`;
          }
          this.keyword.push([key, operation, item]);
        }
      });
      this.handleSubmit();
      this.$refs.modal.hidden();
    },
    async handleSubmit() {
      await this.updateKeyword({
        module: this.module,
        keyword: this.keyword
      });
      this.$emit("get-data");
    }
  },
  computed: {
    hasSearch() {
      return this.$store.state[this.module].keyword.length;
    },
    formData() {
      return this.$store.state[this.module].searchData;
    },
    formItem() {
      return this.$formData[this.module].searchformItem;
    }
  }
};
</script>
<style lang="scss" scoped>
.input-group {
  width: 80%;
}
.has-search {
  position: relative;
  &::after {
    content: "\2022";
    position: absolute;
    right: 3px;
    top: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    font-size: 1.5rem;
  }
}
</style>