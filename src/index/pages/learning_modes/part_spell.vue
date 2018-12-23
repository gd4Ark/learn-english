<template>
    <spell :proportion="proportion"
           :list="$store.state.wordBook.list"
           :currentProblem="currentProblem"
           @next="next">
    </spell>
</template>
<script>
import Spell from '@/index/components/spell'
export default {
  props: {
    currentProblem: Number,
  },
  components: {
    Spell
  },
  methods : {
    next(){
      this.$emit('next');
    },
  },
  computed: {
    proportion(){
      return parseFloat(this.$store.state.setting.part_spell_proportion);
    }
  }
}
</script>