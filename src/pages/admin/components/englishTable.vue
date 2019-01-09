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
    <pagination
      :module="$store.state.english"
      @get-data="getData"
    />
  </div>
</template>
<script>
import searchEnglish from "@/pages/admin/components/searchEnglish.vue";
import addEnglish from "@/pages/admin/components/addEnglish.vue";
import editEnglish from "@/pages/admin/components/editEnglish.vue";
import pagination from "@/common/components/pagination.vue";
import manageTable from "@/common/mixins/manageTable";
import { mapActions } from "vuex";
export default {
  mixins: [manageTable],
  components: {
    searchEnglish,
    addEnglish,
    editEnglish,
    pagination
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
  }
};
</script>
