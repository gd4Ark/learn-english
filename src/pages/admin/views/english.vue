<template>
  <wrap>
    <div class="index-container">
      <div class="app-header">
        <back />
        <h1 class="title">{{ $route.meta.title }}</h1>
      </div>
      <english-table v-if="done" @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import englishTable from "@/pages/admin/components/englishTable.vue";
import { mapActions,mapMutations } from "vuex";
export default {
  components: {
    englishTable,
  },
  data(){
    return {
      done : false,
    }
  },
  mounted(){
    this.updateBookId({
      book_id : this.id,
    });
    // Update the book ID first and then get
    setTimeout(()=>{
      this.done = true;
    },0);
  },
  methods: {
    ...mapActions({
      getData: "getEnglish",
    }),
    ...mapMutations({
      updateBookId: "updateEnglish",
    }),
  },
  computed : {
    id(){
      return this.$route.query.book_id;
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