<template>
  <search
    :title="title"
    :formItem="$runtime_data.english.searchformItem"
    :formData="english.searchData"
    :searchState="english.keyword.length"
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
    ...mapActions(["englishKeyword", "resetEnglishSearchData"]),
    async submit(keyword) {
      await this.englishKeyword(keyword);
      this.$emit("get-data");
    },
    reset() {
      this.resetEnglishSearchData();
    }
  },
  computed: {
    ...mapState(["english"])
  }
};
</script>
