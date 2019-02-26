<template>
  <el-Pagination
    background
    small
    layout="total,sizes,prev,next,jumper"
    :total="module.total"
    :current-page.sync="module.pageIndex"
    :page-sizes="module.pageSizes"
    :page-size.sync="module.pageSize"
    @current-change="handleCurrentChange"
    @size-change="handleSizeChange"
  >
  </el-Pagination>
</template>
<script>
export default {
  props: {
    module: Object
  },
  methods: {
    getData() {
      this.$emit("get-data");
    },
    handleCurrentChange() {
      this.getData();
    },
    handleSizeChange(val) {
      this.getData();
    }
  }
};
</script>
