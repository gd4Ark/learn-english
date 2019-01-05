<template>
  <wrap>
    <div class="index-container">
      <div class="app-header">
        <h1 class="title">{{ $route.meta.title }}</h1>
      </div>
      <book-table @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import bookTable from "@/pages/admin/components/bookTable.vue";
import { mapActions } from "vuex";
export default {
  components: {
    bookTable,
  },
  mounted(){
    this.getData();
  },
  methods: {
    ...mapActions({
      getData: "getBook",
    }),
  },
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