<template>
  <pop-wrap>
    <div class="app-content">
      <english-table v-if="done" @get-data="getData" />
    </div>
  </pop-wrap>
</template>

<script>
import EnglishTable from "@/pages/admin/components/EnglishTable";
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
    this.updatebook_id({
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
      updatebook_id: "updateEnglish",
    }),
  },
  computed : {
    id(){
      return this.$route.query.book_id;
    }
  }
};
</script>