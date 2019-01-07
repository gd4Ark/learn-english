<template>
  <reviewing>
    <div class="problem">
      <p class="chinese">中文</p>
      <p class="english">
        ch_ne_e
      </p>
    </div>
    <keyboard></keyboard>
  </reviewing>
</template>

<script>
import reviewing from "@/pages/user/components/reviewing";
import keyboard from "@/pages/user/components/keyboard";
export default {
  components: {
    reviewing,
    keyboard,
  }
};
</script>
<style lang="scss" scoped>
.problem{
  flex: 1;
  @include flex-column;
  @include sub-center;
  .chinese{
    font-size: 1.8rem;
    margin-bottom: 5vh;
  }
  .english{
    font-size: 1.5rem;
  }
}
</style>
