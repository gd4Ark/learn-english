<template>
  <wrap>
    <div class="app-header">
      <h1>清技背单词</h1>
    </div>
    <div id="learn">
      <div id="content-panel">
        <div class="text-box">
          <p class="number">{{ show_count }}</p>
          <p class="title">{{ show_title }}</p>
        </div>
      </div>
      <button @click="start"
              class="big-btn principal-btn">开始</button>
      <button @click="openBookModal"
              class="big-btn select-word-book-btn">选择单词本</button>
      <modal :show="showBookModal"
             :closeFn="closeBookModal">
        <div class="edit-modal-container">
          <div class="select-word-book">
            <h3>请选择一个单词本</h3>
            <div class="form-group">
              <select class="form-input"
                      v-model="selectWordBookId">
                <option v-for="(item) of $store.state.wordBookList"
                        :value="item.id"
                        :key="item.id"
                        :selected="is_select(item.id)">
                  {{ item.title }}
                </option>
              </select>
            </div>
            <button @click="submit"
                    class="big-btn submit-btn">确定</button>
          </div>
        </div>
      </modal>
    </div>
  </wrap>
</template>
<script>
import Wrap from '@/common/layouts/user_wrap'
import Modal from '@/common/components/modal'
export default {
  data() {
    return {
      selectWordBookId: '',
      showBookModal: false
    }
  },
  components: {
    Wrap,
    Modal
  },
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      this.selectWordBookId = this.$store.state.wordBookId
      this.$store.dispatch('refreshWordBookList')
      this.$store.dispatch('refreshWordBook')
    },
    start() {
      const count = this.$store.state.wordBook.count;
      if (parseInt(count) === 0){
          return alert('没有单词！');
      }
      this.$router.push('/learning')
    },
    submit() {
      this.$store.commit('updateWordBookId', {
        id: this.selectWordBookId
      })
      this.closeBookModal()
      this.refresh()
    },
    openBookModal() {
      this.showBookModal = true
    },
    closeBookModal() {
      this.showBookModal = false
    }
  },
  computed: {
    show_title() {
      const wordBook = this.$store.state.wordBook
      return wordBook.title ? wordBook.title : '没有选择单词本'
    },
    show_count() {
      const wordBook = this.$store.state.wordBook
      return wordBook.count ? wordBook.count : ''
    },
    is_select() {
      return id => {
        return this.$store.state.wordBook.id === id
      }
    }
  }
}
</script>
<style lang="scss" scoped>
h1 {
  font-size: 1.2rem;
}
#learn {
  @include padding-x;
  height: 100%;
  padding-top: 20%;
  #content-panel {
    display: flex;
    justify-content: space-around;
    padding: 20% 0;
    margin: 0 auto;
    width: 100%;
    border-radius: 20px;
    background: $secondary-color;
    text-align: center;
    line-height: 2;
    .text-box {
      width: 50%;
    }
    .title {
      color: $secondary-font-color;
    }
    .number {
      font-size: 2rem;
      font-weight: bold;
    }
  }
  .big-btn {
    margin: 20px auto;
    width: 100%;
  }
}
</style>

