<template>
  <wrap>
    <div class="index-container">
      <div class="app-header">
        <back />
        <h1 class="title">{{ $route.meta.title }}</h1>
      </div>
      <english-table @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import back from "@/common/components/back";
import wrap from "@/common/layouts/pop_wrap.vue";
import englishTable from "@/pages/user/components/englishTable.vue";
import { mapActions, mapMutations } from "vuex";
export default {
  components: {
    back,
    wrap,
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