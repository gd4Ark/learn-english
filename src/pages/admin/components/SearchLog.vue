<template>
  <search
    :title="title"
    :formItem="$formData.log.searchformItem"
    :formData="log.searchData"
    :searchState="log.keyword.length"
    @submit="submit"
    @reset="reset"
  >
  </search>
</template>
<script>
import Search from "@/common/components/Search";
import { mapActions, mapState } from "vuex";
export default {
  components: {
    Search
  },
  data: () => ({
    title: "日志筛选框"
  }),
  mounted() {
    this.reset();
  },
  methods: {
    ...mapActions(["logKeyword", "resetLogSearchData"]),
    async submit(keyword) {
      await this.logKeyword(keyword);
      this.$emit("get-data");
    },
    reset() {
      this.resetLogSearchData();
    }
  },
  computed: {
    ...mapState(["log"])
  }
};
</script>
