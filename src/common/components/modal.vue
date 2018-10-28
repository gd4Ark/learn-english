<template>
    <div :class="['modal',{'show':show}]"
         v-on:click="closeFn">
        <div class="modal-content"
             @click.stop="">
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
  props: {
    show: Boolean,
    closeFn: Function
  }
}
</script>
<style lang="scss" scoped>
.modal {
  @include center;
  @include size(100%);
  @include flex-column;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.2);
  transition: all 0.4s 0.2s ease;
  visibility: hidden;
  opacity: 0;
  &.show {
    visibility: visible;
    opacity: 1;
    transition: all 0.4s ease;
    .modal-content {
      transform: translateY(0);
      opacity: 1;
    }
  }
  .modal-content {
    @include size(70%, auto);
    @include padding-x;
    border-radius: 5px;
    background: $secondary-color;
    transition: all 0.25s ease;
    transform: translateY(-50vh);
    opacity: 0;
  }
}
</style>
