<template>
    <div class="keyboard"
         @click="keyDown">
        <div class="row">
            <button class="key">q</button>
            <button class="key">w</button>
            <button class="key">e</button>
            <button class="key">r</button>
            <button class="key">t</button>
            <button class="key">y</button>
            <button class="key">u</button>
            <button class="key">i</button>
            <button class="key">o</button>
            <button class="key">p</button>
        </div>
        <div class="row">
            <button class="key">a</button>
            <button class="key">s</button>
            <button class="key">d</button>
            <button class="key">f</button>
            <button class="key">g</button>
            <button class="key">h</button>
            <button class="key">j</button>
            <button class="key">k</button>
            <button class="key">l</button>
        </div>
        <div class="row">
            <button class="key del">ㄨ</button>
            <button class="key">z</button>
            <button class="key">x</button>
            <button class="key">c</button>
            <button class="key">v</button>
            <button class="key">b</button>
            <button class="key">n</button>
            <button class="key">m</button>
            <button class="key del">ㄨ</button>
        </div>
    </div>
</template>
<script>
export default {
  props: {
    callback: Function
  },
  methods: {
    keyDown(e) {
      const target = e.target
      const list = target.classList
      const key = list.contains('del') ? 'del' : target.innerHTML
      if (!list.contains('key')) return
      this.callback(key)
    }
  }
}
</script>

<style lang="scss" scoped>
.keyboard {
  padding: 3% 1%;
  display: flex;
  align-content: space-around;
  flex-wrap: wrap;
  background: $keyboard-color;
  .row {
    box-sizing: border-box;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    &:nth-child(2) {
      padding: 3% 0%;
    }
  }
  .key {
    user-select: none;
    cursor: pointer;
    & + .key {
      margin-left: 1%;
    }
    width: calc((100% - 9 * 1%) / 10);
    height: 2.5rem;
    line-height: 2.5rem;
    font-size: 1.4rem;
    color: $keyboard-key-font-color;
    @include btn-3d($keyboard-key-color);
    &.transparent {
      visibility: hidden;
    }
    &.del {
      flex: 1;
      background: #c1bbb4;
      color: #716d65;
    }
  }
}
</style>
