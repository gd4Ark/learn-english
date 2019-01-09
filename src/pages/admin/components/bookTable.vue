<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        <add-book @get-data="getData" />
        <el-button
          style="margin-left:10px"
          size="mini"
          type="danger"
          icon="el-icon-delete"
          @click="handleDelete(multipleSelection)"
        ></el-button>
      </div>
      <search-book @get-data="getData" />
    </div>

    <el-table
      :data="$store.state.book.list"
      class="table"
      height="100%"
      @selection-change="handleSelectionChange"
    >
      <el-table-column
        type="selection"
        width="40"
        align="center"
      />
      <el-table-column
        v-for="(item,index) in tableColumns"
        :prop="item.prop"
        :label="item.label"
        :key="index"
        align="center"
      />
      <el-table-column
        label="操作"
        width="145"
        align="center"
      >
        <template slot-scope="scope">
          <el-button
            size="mini"
            icon="el-icon-ali-manage"
            @click="handleManage(scope.row.id)"
          ></el-button>
          <edit-book
            @get-data="getData"
            :current="scope.row"
          />
          <el-button
            size="mini"
            type="danger"
            icon="el-icon-delete"
            @click="handleDelete([scope.row.id])"
          ></el-button>
        </template>
      </el-table-column>
    </el-table>
    <pagination
      :module="$store.state.book"
      @get-data="getData"
    />
  </div>
</template>
<script>
import searchBook from "@/pages/admin/components/searchBook.vue";
import addBook from "@/pages/admin/components/addBook.vue";
import editBook from "@/pages/admin/components/editBook.vue";
import pagination from "@/common/components/pagination.vue";
import manageTable from "@/common/mixins/manageTable";
import { mapActions } from "vuex";
export default {
  mixins: [manageTable],
  components: {
    searchBook,
    addBook,
    editBook,
    pagination
  },
  data: () => ({
    tableColumns: [
      {
        label: "名字",
        prop: "name"
      },
      {
        label: "单词数",
        prop: "english_count"
      }
    ],
    multipleSelection: []
  }),
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      delData: "delBook"
    }),
    handleManage(id) {
      this.$router.push({
        path: "/book/english",
        query: {
          book_id: id
        }
      });
    }
  }
};
</script>
