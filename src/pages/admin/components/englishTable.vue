<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        <add-english @get-data="getData" />
        <el-button
          style="margin-left:10px"
          size="mini"
          type="danger"
          icon="el-icon-delete"
          @click="handleDelete(multipleSelection)"
        ></el-button>
      </div>
      <search-english @get-data="getData" />
    </div>

    <el-table
      :data="$store.state.english.list"
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
        v-for="(item,index) in tableColumns"
        :prop="item.prop"
        :label="item.label"
        :key="index"
        align="center"
      />
      <el-table-column
        label="操作"
        width="110"
        align="center"
      >
        <template slot-scope="scope">
          <edit-english
            @get-data="getData"
            :current="scope.row"
          />
          <el-button
            style="margin: 0 10px"
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
import addEnglish from "@/pages/admin/components/addEnglish.vue";
import editEnglish from "@/pages/admin/components/editEnglish.vue";
import { mapActions } from "vuex";
export default {
  components: {
    searchEnglish,
    addEnglish,
    editEnglish
  },
  data: () => ({
    tableColumns: [
      {
        label: "中文",
        prop: "chinese"
      },
      {
        label: "英文",
        prop: "english"
      }
    ],
    multipleSelection: []
  }),
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      delData: "delEnglish"
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
