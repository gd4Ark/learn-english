<template>
  <wrap>
    <div id="index">
      <div class="app-header">
        <h1 class="title">后台管理</h1>
        <router-link class="add"
                     to="/addWordList"></router-link>
      </div>
      <div class="word_list_group_container">
        <transition-group name="list-complete"
                          tag="div">
          <div class="word_list_item list-complete-item"
               v-for="(item) of $store.state.wordBookList"
               :key="item.id"
               @click="toWordList(item.id)">
            <div class="info">
              <p class="title">
                {{ item.title }}
              </p>
              <p class="count">
                {{ item.count }}
              </p>
            </div>
            <div class="option">
              <button class="small-btn"
                      @click.stop="openEditModal(item)">编辑</button>
              <button class="small-btn warning-btn"
                      @click.stop="remove(item)">删除</button>
            </div>
          </div>
        </transition-group>
      </div>
    </div>
    <edit-modal :show="showEditModal"
                :closeFn="closeEditModal">
      <div class="edit-modal-container">
        <div class="form-group">
          <label for="#chinese">标题：</label>
          <input id="chinese"
                 type="text"
                 class="form-input"
                 v-model="currentEdit.title">
        </div>
        <div class="btn-group">
          <button class="big-btn btn-item"
                  @click="update">确定</button>
        </div>
      </div>
    </edit-modal>
  </wrap>
</template>
<script>
import Wrap from '@/common/layouts/admin_wrap'
import EditModal from '@/common/components/modal'
export default {
  data() {
    return {
      showEditModal: false,
      currentEdit: {}
    }
  },
  components: {
    Wrap,
    EditModal
  },
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      this.$store.dispatch('refreshWordBookList')
    },
    toWordList(id) {
      this.$store.commit('updateWordBookId', {
        id: id
      })
      this.$router.push('wordList')
    },
    openEditModal(item) {
      this.currentEdit = item
      this.showEditModal = true
    },
    closeEditModal() {
      this.showEditModal = false
    },
    remove(item) {
      const status = confirm(`确认删除《${item.title}》吗？`)
      if (!status) {
        return
      }
      this.$store.dispatch('delWordBook', item.id).then(() => {
        this.refresh()
      })
    },
    update(item) {
      this.$store
        .dispatch('updateWordBook', this.currentEdit)
        .then(() => {
          this.refresh()
        })
        .catch(() => {
          this.refresh()
        })
      this.closeEditModal()
    }
  }
}
</script>
<style lang="scss" scoped>
#index {
  @include size(100%);
  @include flex-column;
  background: $secondary-color;
  .word_list_group_container {
    position: relative;
    flex: 1;
    background: $principal-color;
    overflow: hidden;
  }
  .word_list_group_container > div {
    @include padding;
    @include size(100%, 97%);
    position: absolute;
    overflow-y: auto;
    overflow-x: hidden;
  }
  .word_list_item {
    user-select: none;
    display: inline-flex;
    @include size(100%, 100px);
    padding: 2%;
    background: $secondary-color;
    border-radius: 10px;
    margin-bottom: 10%;
    & > div {
      flex: 1;
      @include flex-column;
      align-items: center;
      justify-content: space-around;
    }
  }
}
</style>

