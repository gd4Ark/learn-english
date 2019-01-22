<template>
  <pop-wrap>
    <div class="app-content">
      <english-table @get-data="getData" />
    </div>
  </pop-wrap>
</template>

<script>
import EnglishTable from "@/pages/user/components/EnglishTable";
import { mapActions, mapMutations } from "vuex";
export default {
  components: {
    EnglishTable
  },
  methods: {
    ...mapActions({
      getData: "getEnglish"
    }),
    ...mapMutations({
      updateEnglish: "updateEnglish"
    })
  }
};
</script>