<template>
  <v-card :title="title"
          class="table-card">
    <div slot="toolbar"
         class="toolbar">
      <modal-add :btn-size="respBtnSize"
                 :form-item="$v_data[module].common.item"
                 :get-form-data="$v_data[module].common.data"
                 :module="module"
                 title="添加单词本"
                 @get-data="getData" />
      <el-button :size="respBtnSize"
                 type="danger"
                 @click="handleDelete(multipleSelection)">
        删除
      </el-button>
    </div>

    <v-table ref="table"
             :loading="loading"
             :data="state.data"
             :columns="columns"
             @selection-change="handleSelectionChange"
             @sort-change="handleSortChange">
      <el-table-column slot="append"
                       label="操作"
                       align="center"
                       min-width="250">
        <template slot-scope="scope">
          <modal-edit :title="`编辑单词本 『${scope.row.name }』 中`"
                      :form-item="$v_data[module].common.item"
                      :current="scope.row"
                      :module="module"
                      btn-size="mini"
                      @get-data="getData" />
          <el-button size="mini"
                     @click="toWord(scope.row.id)">
            单词管理
          </el-button>
          <el-button size="mini"
                     type="danger"
                     @click="handleDelete([scope.row.id])">
            删除
          </el-button>
        </template>
      </el-table-column>
    </v-table>

    <pagination :state="state"
                :module="module"
                :get-data="getData"
                @before-change="beforeChange"
                @after-change="afterChange" />
  </v-card>
</template>
<script>
const __module = 'books'
import vTable from '@/common/components/Table'
import Pagination from '@/common/components/Pagination'
import ModalEdit from '@/common/components/ModalEdit'
import ModalAdd from '@/common/components/ModalAdd'
import ManageTable from '@/common/mixins/ManageTable'
import { mapState, mapMutations } from 'vuex'
export default {
    components: {
        vTable,
        Pagination,
        ModalEdit,
        ModalAdd
    },
    mixins: [ManageTable],
    props: {
        title: {
            type: String,
            default: '单词本表'
        }
    },
    data: () => ({
        module: __module,
        columns: [
            {
                prop: 'name',
                label: '名称',
                sortable: 'custom',
                minWidth: 100
            },
            {
                prop: 'words_count',
                label: '单词数量',
                sortable: 'custom',
                minWidth: 100
            }
        ]
    }),
    computed: {
        ...mapState({
            state: __module
        })
    },
    async created() {
        await this.getData()
        this.makeLoaded()
    },
    methods: {
        ...mapMutations(__module, {
            setOrder: 'update'
        }),
        toWord(id) {
            this.$router.push({
                name: 'words',
                params: {
                    id
                }
            })
        }
    }
}
</script>
