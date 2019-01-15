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
    <Pagination
      :module="english"
      @get-data="getData"
    />
  </div>
</template>
<script>
import SearchEnglish from "@/pages/admin/components/SearchEnglish.vue";
import AddEnglish from "@/pages/admin/components/AddEnglish.vue";
import EditEnglish from "@/pages/admin/components/EditEnglish.vue";
import Pagination from "@/common/components/Pagination.vue";
import ManageTable from "@/common/mixins/ManageTable";
import { mapActions,mapState } from "vuex";
export default {
  mixins: [ManageTable],
  components: {
    SearchEnglish,
    AddEnglish,
    EditEnglish,
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
  computed : {
    ...mapState(['english'])
  }
};
</script>
