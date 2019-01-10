<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        {{currentBook.name}}
      </div>
      <search-english @get-data="getData" />
    </div>

    <el-table
      :data="$store.state.english.list"
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
    <pagination
      :module="$store.state.english"
      @get-data="getData"
    />
  </div>
</template>
<script>
import searchEnglish from "@/pages/admin/components/searchEnglish.vue";
import pagination from "@/common/components/pagination.vue";
import currentBook from "@/common/mixins/currentBook";
export default {
  mixins : [currentBook],
  components: {
    searchEnglish,
    pagination
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
  }
};
</script>
