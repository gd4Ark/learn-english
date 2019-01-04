<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        {{$store.state.book.current.name}}
      </div>
      <search-english @get-data="getData" />
    </div>

    <el-table
      :data="$store.state.english.list"
      class="table"
      height="100%"
    >
      <el-table-column
        prop="english"
        label="英文"
        align="center"
      >
      </el-table-column>
      <el-table-column
        prop="chinese"
        label="中文"
        align="center"
      >
      </el-table-column>
    </el-table>
    <el-pagination
      background
      small
      layout="total,sizes,prev,next,jumper"
      :total="$store.state.english.total"
      :current-page.sync="$store.state.english.pageIndex"
      :page-sizes="$store.state.english.pageSizes"
      :page-size.sync="$store.state.english.pageSize"
      @current-change="handleCurrentChange"
      @size-change="handleSizeChange"
    >
    </el-pagination>
  </div>
</template>
<script>
import searchEnglish from "@/pages/admin/components/searchEnglish.vue";
import { mapActions } from "vuex";
export default {
  data() {
    return {
      multipleSelection: []
    };
  },
  components: {
    searchEnglish
  },
  mounted() {
    this.getData();
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
