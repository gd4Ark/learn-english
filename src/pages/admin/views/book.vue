<template>
  <wrap>
    <div class="app-content">
      <book-table @get-data="getData" />
    </div>
  </wrap>
</template>

<script>
import bookTable from "@/pages/admin/components/bookTable.vue";
import { mapActions } from "vuex";
export default {
  components: {
    bookTable
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