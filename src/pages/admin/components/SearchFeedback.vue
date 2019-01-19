<template>
  <search
    :title="title"
    :formItem="$formData.feedback.searchformItem"
    :formData="feedback.searchData"
    :searchState="feedback.keyword.length"
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
    title: "反馈内容筛选框"
  }),
  mounted() {
    this.reset();
  },
  methods: {
    ...mapActions(["feedbackKeyword", "resetFeedbackSearchData"]),
    async submit(keyword) {
      await this.feedbackKeyword(keyword);
      this.$emit("get-data");
    },
    reset() {
      this.resetFeedbackSearchData();
    }
  },
  computed: {
    ...mapState(["feedback"])
  }
};
</script>
