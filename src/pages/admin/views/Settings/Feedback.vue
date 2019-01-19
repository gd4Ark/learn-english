<template>
  <pop-wrap>
    <div class="app-content">
      <feedback-table @get-data="getData" />
    </div>
  </pop-wrap>
</template>

<script>
import FeedbackTable from "@/pages/admin/components/FeedbackTable";
import { mapActions } from "vuex";
export default {
  components: {
    FeedbackTable,
  },
  methods: {
    ...mapActions({
      getData: "getFeedback",
    }),
  },
};
</script>