<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        <add
          title="添加单词本"
          module="book"
          action="addBook"
          @get-data="getData"
        />
        <el-button
          style="margin-left:10px"
          size="mini"
          type="danger"
          icon="el-icon-delete"
          @click="handleDelete(multipleSelection)"
        />
      </div>
      <search
        title="单词本筛选框"
        module="book"
        @get-data="getData"
      />
    </div>

    <el-table
      :data="book.list"
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
          />
          <edit
            title="编辑单词本"
            module="book"
            action="updateBook"
            @get-data="getData"
            :current="scope.row"
          />
          <el-button
            size="mini"
            type="danger"
            icon="el-icon-delete"
            @click="handleDelete([scope.row.id])"
          />
        </template>
      </el-table-column>
    </el-table>
    <Pagination
      :module="book"
      @get-data="getData"
    />
  </div>
</template>
<script>
import Search from "@/common/components/Search";
import Add from "@/common/components/Add";
import Edit from "@/common/components/Edit";
import Pagination from "@/common/components/Pagination";
import ManageTable from "@/common/mixins/ManageTable";
import { mapActions, mapState } from "vuex";
export default {
  mixins: [ManageTable],
  components: {
    Search,
    Add,
    Edit,
    Pagination
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
        path: "/english",
        query: {
          book_id: id
        }
      });
    }
  },
  computed: {
    ...mapState(["book"])
  }
};
</script>
