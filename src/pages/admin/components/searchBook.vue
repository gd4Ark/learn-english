<template>
  <search
    :title="title"
    :formItem="$runtime_data.book.searchformItem"
    :formData="book.searchData"
    :searchState="book.keyword.length"
    @submit="submit"
    @reset="reset"
  >
  </search>
</template>
<script>
import Search from "@/common/components/search";
import { mapActions, mapState } from "vuex";
export default {
  components: {
    Search
  },
  data: () => ({
    title: "单词筛选框"
  }),
  mounted() {
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
  computed: {
    ...mapState(["book"])
  }
};
</script>
