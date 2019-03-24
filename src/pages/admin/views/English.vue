<template>
  <pop-wrap>
    <div class="app-content">
      <english-table v-if="done" @get-data="getData" />
    </div>
  </pop-wrap>
</template>

<script>
import EnglishTable from "@/pages/admin/tables/EnglishTable";
import { mapActions,mapMutations } from "vuex";
export default {
  components: {
    EnglishTable,
  },
  data(){
    return {
      done : false,
    }
  },
  mounted(){
    this.update_book_id({
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
      update_book_id: "english",
    }),
  },
  computed : {
    id(){
      return this.$route.query.book_id;
    }
  }
};
</script>