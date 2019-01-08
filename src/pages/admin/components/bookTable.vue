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
      >
      </el-table-column>
      <el-table-column
        prop="name"
        label="名字"
        align="center"
      >
      </el-table-column>
      <el-table-column
        prop="english_count"
        label="单词"
        width="70"
        align="center"
      >
      </el-table-column>
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
    <el-pagination
      background
      small
      layout="total,sizes,prev,next,jumper"
      :total="$store.state.book.total"
      :current-page.sync="$store.state.book.pageIndex"
      :page-sizes="$store.state.book.pageSizes"
      :page-size.sync="$store.state.book.pageSize"
      @current-change="handleCurrentChange"
      @size-change="handleSizeChange"
    >
    </el-pagination>
  </div>
</template>
<script>
import searchBook from "@/pages/admin/components/searchBook.vue";
import addBook from "@/pages/admin/components/addBook.vue";
import editBook from "@/pages/admin/components/editBook.vue";
import { mapActions } from "vuex";
export default {
  data() {
    return {
      multipleSelection: []
    };
  },
  components: {
    searchBook,
    addBook,
    editBook
  },
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      delData: "delBook"
    }),
    getData() {
      this.$emit("get-data");
    },
    handleDelete(ids) {
      if (ids.length === 0) {
        return this.$util.msg_error("没有选中项！");
      }
      this.$util
        .confirm({
          content: "确认删除？"
        })
        .then(() => {
          this.delete(ids);
        })
        .catch(() => {
          this.$util.msg_info("已取消删除");
        });
    },
    async delete(ids) {
      await this.delData({
        ids
      });
      this.getData();
      this.$util.msg_success("删除成功!");
    },
    handleManage(id) {
      this.$router.push({
        path: "/book/english",
        query: {
          book_id: id
        }
      });
    },
    handleSelectionChange(val) {
      this.multipleSelection = val.map(el => el.id);
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
