<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        <add
          title="添加日志"
          moduleKey="log"
          action="addLog"
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
        title="日志筛选框"
        moduleKey="log"
        submitAction="logKeyword"
        resetAction="resetLogSearchData"
        @get-data="getData"
      />
    </div>

    <el-table
      :data="log.list"
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
          <div
            v-if="props.row.fix !== '无'"
            class="text"
          >
            <h3>修复：</h3>
            <p>
              {{props.row.fix}}
            </p>
          </div>
          <div
            v-if="props.row.feat !== '无'"
            class="text"
          >
            <h3>更新：</h3>
            <p>
              {{props.row.feat}}
            </p>
          </div>
          <div class="text">
            <time>创建时间：<span>{{props.row.created_at}}</span></time>
            <time>更新时间：<span>{{props.row.updated_at}}</span></time>
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
        width="145"
        align="center"
      >
        <template slot-scope="scope">
          <edit
            title="编辑日志"
            moduleKey="log"
            action="updateLog"
            @get-data="getData"
            :current="scope.row"
          />
          <el-button
            style="margin: 0 10px"
            size="mini"
            type="danger"
            icon="el-icon-delete"
            @click="handleDelete([scope.row.id])"
          />
        </template>
      </el-table-column>
    </el-table>
    <Pagination
      :module="log"
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
        label: "版本",
        prop: "version"
      }
    ],
    multipleSelection: []
  }),
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      delData: "delLog"
    })
  },
  computed: {
    ...mapState(["log"])
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
  p {
    text-indent: 2rem;
    font-size: 0.8rem;
  }
}
</style>