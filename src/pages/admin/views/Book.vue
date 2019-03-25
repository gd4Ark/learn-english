<template>
  <wrap>
    <div class="app-content">
      <book-table @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import BookTable from "@/pages/admin/tables/BookTable";
import { mapActions } from "vuex";
export default {
  components: {
    BookTable
  },
  mounted() {
    this.getData();
  },
  methods: {
    ...mapActions({
      getData: "getBook"
    })
  }
};
</script>