<template>
    <spell :proportion="proportion"
           :list="$store.state.wordBook.list"
           :currentProblem="currentProblem"
           :onNext="onNext">
    </spell>
</template>
<script>
import Spell from '@/index/components/spell'
export default {
  props: {
    currentProblem: Number,
    onNext: Function
  },
  components: {
    Spell
  },
  computed: {
    proportion(){
      return parseFloat(this.$store.state.setting.part_spell_proportion);
    }
  }
}
</script>