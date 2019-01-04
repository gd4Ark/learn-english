<template>
  <search
    :title="title"
    :formItem="$runtime_data.book.searchformItem"
    :formData="$store.state.book.searchData"
    :searchState="$store.state.book.keyword.length"
    @submit="submit"
    @reset="reset"
  >
  </search>
</template>
<script>
import Search from "@/common/components/search";
import { mapActions } from "vuex";
export default {
  components: {
    Search
  },
  mounted(){
    this.reset();
  },
  methods: {
    ...mapActions(["bookKeyword", "resetBookSearchData"]),
    async submit(keyword) {
      await this.bookKeyword(keyword);
      this.$emit("get-data");
    },
    reset() {
      this.resetBookSearchData();
    }
  },
  computed : {
    title(){
      return  '单词本筛选框';
    }
  }
};
</script>
