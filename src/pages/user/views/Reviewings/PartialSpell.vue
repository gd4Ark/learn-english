<template>
  <spell 
    v-if="setting.partial_spell_proportion"
    :spellProportion="setting.partial_spell_proportion"
    @next="next"
  />
</template>
<script>
import { mapState } from "vuex";
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
  computed : {
    ...mapState(["setting"])
  }
};
</script>
