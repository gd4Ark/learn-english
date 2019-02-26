<template>
  <pop-wrap>
    <div class="app-content">
      <log-table @get-data="getData" />
    </div>
  </pop-wrap>
</template>

<script>
import LogTable from "@/pages/admin/components/LogTable";
import { mapActions,mapMutations } from "vuex";
export default {
  components: {
    LogTable,
  },
  methods: {
    ...mapActions({
      getData: "getLog",
    }),
  },
};
</script>