<template>
  <pop-wrap>
    <div class="index-container">
      <div class="app-header">
        <back />
        <h1 class="title">{{ $route.meta.title }}</h1>
      </div>
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
<style lang="scss" scoped>
.index-container {
  @include size(100%);
  @include flex-column;
  .table-content {
    flex: 1;
    overflow: hidden;
    @include flex-column;
  }
}
.table-content {
  @include padding;
}
</style>