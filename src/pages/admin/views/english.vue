<template>
  <pop-wrap>
    <div class="app-content">
      <english-table v-if="done" @get-data="getData" />
    </div>
  </pop-wrap>
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