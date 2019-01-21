<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        {{currentBook.name}}
      </div>
      <search
        title="单词本筛选框"
        moduleKey="english"
        submitAction="englishKeyword"
        resetAction="resetEnglishSearchData"
        @get-data="getData"
      />
    </div>

    <el-table
      :data="english.list"
      class="table"
      height="100%"
    >
      <el-table-column
        v-for="(item,index) in tableColumns"
        :prop="item.prop"
        :label="item.label"
        :key="index"
        align="center"
      />
    </el-table>
    <Pagination
      :module="english"
      @get-data="getData"
    />
  </div>
</template>
<script>
import Search from "@/common/components/Search";
import Pagination from "@/common/components/Pagination";
import CurrentBook from "@/common/mixins/CurrentBook";
import { mapState } from "vuex";
export default {
  mixins: [CurrentBook],
  components: {
    Search,
    Pagination
  },
  data: () => ({
    tableColumns: [
      {
        label: "英文",
        prop: "english"
      },
      {
        label: "中文",
        prop: "chinese"
      }
    ]
  }),
  mounted() {
    this.getData();
  },
  methods: {
    getData() {
      this.$emit("get-data");
    }
  },
  computed: {
    ...mapState(["english"])
  }
};
</script>
