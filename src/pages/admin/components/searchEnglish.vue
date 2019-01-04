<template>
  <search
    :title="title"
    :formItem="$runtime_data.english.searchformItem"
    :formData="$store.state.english.searchData"
    :searchState="$store.state.english.keyword.length"
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
    ...mapActions(["englishKeyword", "resetEnglishSearchData"]),
    async submit(keyword) {
      await this.englishKeyword(keyword);
      this.$emit("get-data");
    },
    reset() {
      this.resetEnglishSearchData();
    }
  },
  computed : {
    title(){
      return  '单词筛选框';
    }
  }
};
</script>
