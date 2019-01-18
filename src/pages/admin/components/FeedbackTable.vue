<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        <el-button
          size="mini"
          type="danger"
          icon="el-icon-delete"
          @click="handleDelete(multipleSelection)"
        />
      </div>
      <search-feedback @get-data="getData" />
    </div>

    <el-table
      :data="feedback.list"
      class="table"
      height="100%"
      @selection-change="handleSelectionChange"
    >
      <el-table-column
        type="selection"
        width="40"
        align="center"
      />
      <el-table-column type="expand">
        <template slot-scope="props">
          <div class="text">
            <h3>问题描述：</h3>
            <el-card shadow="never">
              {{props.row.message}}
            </el-card>
          </div>
          <div
            v-if="props.row.contact"
            class="text"
          >
            <h3>
              联系方式：
              <span>{{props.row.contact}}</span>
            </h3>
            <h3>
              提交时间：
              <span>{{props.row.created_at}}</span>
            </h3>
          </div>
        </template>
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
      :module="feedback"
      @get-data="getData"
    />
  </div>
</template>
<script>
import SearchFeedback from "@/pages/admin/components/SearchFeedback";
import Pagination from "@/common/components/Pagination";
import ManageTable from "@/common/mixins/ManageTable";
import { mapActions, mapState } from "vuex";
export default {
  mixins: [ManageTable],
  components: {
    SearchFeedback,
    Pagination
  },
  data: () => ({
    tableColumns: [
      {
        label: "类型",
        prop: "type"
      }
    ],
    multipleSelection: []
  }),
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      delData: "delFeedback"
    }),
  },
  computed: {
    ...mapState(["feedback"])
  }
};
</script>
<style lang="scss" scoped>
.text + .text {
  margin-top: 3vh;
}
.text {
  h3 {
    font-size: 0.9rem;
    font-weight: normal;
    margin-bottom: 2vh;
  }
}
</style>