<template>
  <spell 
    @next="next"
  />
</template>
<script>
import Spell from "@/pages/user/components/Spell";
export default {
  components: {
    Spell
  },
  methods : {
    next(){
      this.$emit("next");
    }
  },
};
</script>
