<template>
  <pop-wrap>
    <div class="app-content">
      <english-table @get-data="getData" />
    </div>
  </pop-wrap>
</template>

<script>
import englishTable from "@/pages/user/components/englishTable.vue";
import { mapActions, mapMutations } from "vuex";
export default {
  components: {
    englishTable
  },
  methods: {
    ...mapActions({
      getData: "getEnglish"
    }),
    ...mapMutations({
      updateEnglish: "updateEnglish"
    })
  },
  computed: {
    id() {
      return this.$store.state.book.current.id;
    }
  }
};
</script>