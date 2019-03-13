<template>
  <div class="table-content">
    <div class="toolbar">
      <div>
        <add
          title="添加单词"
         :formItem="$vData.english.admin.item"
          :getFormData="$vData.english.admin.data"
          action="addEnglish"
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
        module="english"
        @get-data="getData"
      />
    </div>

    <el-table
      :data="english.list"
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
          <edit
            title="编辑单词"
           :formItem="$vData.english.admin.item"
            :current="scope.row"
            action="updateEnglish"
            @get-data="getData"
            :noMargin="true"
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
      :module="english"
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
    })
  },
  computed: {
    ...mapState(["english"])
  }
};
</script>
