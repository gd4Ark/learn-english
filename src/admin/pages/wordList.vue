<template>
    <wrap>
        <div id="index">
            <div class="header">
                <router-link to="/index"
                             class="back"></router-link>
                <h1 class="title">
                    单词本管理
                    <br>
                    <span>
                        {{ $store.state.wordBook.title }}
                    </span>
                </h1>
                <router-link class="add"
                             to="/addEnglish"></router-link>
            </div>
            <div class="search">
                <div class="form-group">
                    <input type="text"
                           class="form-input"
                           v-model="searchStr"
                           placeholder="请输入你需要搜索单词">
                </div>
            </div>
            <div class="container">
                <table class="scroll-table">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox"
                                       v-model="checked"
                                       @change="changeAllSelected()">
                            </th>
                            <th>英文</th>
                            <th>中文</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <transition-group name="list-complete"
                                      tag="tbody">
                        <tr v-for="(item) of searchedList"
                            :key="item.id"
                            class="list-complete-item">
                            <td>
                                <input type="checkbox"
                                       :value="item.id"
                                       v-model="selectedIds">
                            </td>
                            <td class="text">{{ item.english }}</td>
                            <td class="text">{{ item.chinese }}</td>
                            <td>
                                <button class="big-btn"
                                        @click="openEditModal(item)">编辑</button>
                            </td>
                        </tr>
                    </transition-group>
                </table>
            </div>
            <div class="bottom">
                <button class="big-btn warning-btn"
                        :disabled="removeBtnStatus"
                        @click="remove">删除</button>
            </div>
        </div>
        <edit-modal :show="showEditModal"
                    :closeFn="closeShowEditModal">
            <div class="edit-modal-container">
                <div class="form-group">
                    <label for="#chinese">中文：</label>
                    <input id="chinese"
                           type="text"
                           class="form-input"
                           v-model="editEnglish.english">
                </div>
                <div class="form-group">
                    <label for="#english">英语：</label>
                    <input id="english"
                           type="text"
                           class="form-input"
                           v-model="editEnglish.chinese">
                </div>
                <button class="big-btn btn-item"
                        @click="update">确定</button>
            </div>
        </edit-modal>
    </wrap>
</template>
<script>
import Wrap from '@/common/layouts/pop_wrap'
import EditModal from '@/common/components/modal'
export default {
  data() {
    return {
      showEditModal: false,
      checked: false,
      selectedIds: [],
      searchStr: '',
      searchedList: [],
      editEnglish: {
        id: 0,
        english: '',
        chinese: ''
      }
    }
  },
  watch: {
    selectedIds(v) {
      const wordList = this.searchedList
      if (this.selectedIds.length === 0) return
      if (this.selectedIds.length === wordList.length) {
        this.checked = true
      } else {
        this.checked = false
      }
    },
    searchStr() {
      this.updateSearchList()
    }
  },
  mounted() {
    this.refresh()
  },
  components: {
    Wrap,
    EditModal
  },
  methods: {
    refresh() {
      this.selectedIds = []
      this.$store.dispatch('refreshWordBook').then(() => {
        this.updateSearchList()
      })
    },
    updateSearchList() {
      const str = this.searchStr
      const wordList = this.$store.state.wordBook.list
      if (!str) {
        this.searchedList = wordList
        return
      }
      this.searchedList = wordList.filter(v => {
        return v.english.includes(str) || v.chinese.includes(str)
      })
    },
    changeAllSelected() {
      if (this.checked) {
        const wordList = this.searchedList
        this.selectedIds = wordList.map(v => v.id)
      } else {
        this.selectedIds = []
      }
    },
    openEditModal(item) {
      this.editEnglish = item
      this.showEditModal = true
    },
    closeShowEditModal() {
      this.showEditModal = false
    },
    remove() {
      const len = this.selectedIds.length
      if (len === 0) return
      const status = confirm(`确认删除这${len}个单词吗？`)
      if (!status) {
        return
      }
      this.$store.dispatch('delEnglish', this.selectedIds).then(() => {
        this.refresh()
      })
    },
    update() {
      const { english, chinese } = this.editEnglish
      if (!english || !chinese) return
      this.$store
        .dispatch('updateEnglish', this.editEnglish)
        .then(() => {
          // this.refresh();
        })
        .catch(() => {
          this.refresh()
        })
      this.closeShowEditModal()
    }
  },
  computed: {
    removeBtnStatus() {
      return this.selectedIds.length === 0
    }
  }
}
</script>
<style lang="scss" scoped>
#index {
  @include size(100%);
  @include flex-column;
  background: $secondary-color;
  .header {
    @include app-header;
    .title {
      text-align: center;
      span {
        font-size: 0.8rem;
      }
    }
    .add_word_list {
      font-size: 1.5rem;
    }
  }
}
table {
  .text {
    font-size: 0.8rem;
  }
}
.search {
  .form-group {
    margin-top: 0;
  }
}
.container {
  flex: 1;
  background: $principal-color;
}
.big-btn {
  background: transparent;
}
.bottom {
  border-top: 1px solid $line-color;
  background: $secondary-color;
  height: 50px;
}
</style>

