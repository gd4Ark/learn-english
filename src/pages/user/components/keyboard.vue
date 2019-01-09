<template>
  <div
    class="keyboard"
    @click="keydown"
  >
    <div
      class="row"
      v-for="(row,index) in keyList"
      :key="index"
    >
      <button
        :class="className(key)"
        v-for="(key,index) in row"
        :key="index"
        :value="key"
      >
        <template v-if="isFn(key)">
          <i :class="[key ,'el-icon-ali-' + key,{'isUpper' : isUpper}]"></i>
        </template>
        <template v-else>
          {{key}}
        </template>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  data: () => ({
    isUpper: false,
    fn_list: {
      close2: "delete",
      capslock: "capslock"
    },
    keyList: [
      ["q", "w", "e", "r", "t", "y", "u", "i", "o", "p"],
      ["a", "s", "d", "f", "g", "h", "j", "k", "l"],
      ["capslock", "z", "x", "c", "v", "b", "n", "m", "close2"]
    ]
  }),
  methods: {
    isFn(key) {
      return this.fn_list[key];
    },
    className(key) {
      return this.isFn(key) ? ["key", "fn"] : "key";
    },
    keydown(e) {
      const target = e.target;
      const list = target.classList;
      if (!list.contains("key")) return;
      const value = target.getAttribute("value");
      const key = this.fn_list[value] || value;
      if (key === "capslock") {
        return this.caseChange();
      }
      this.$emit("keydown", key);
    },
    caseChange() {
      this.keyList.forEach(row => {
        row.forEach((key, index) => {
          if (!this.isFn(key)) {
            const call = this.isUpper
              ? "toLocaleLowerCase"
              : "toLocaleUpperCase";
            const val = key[call]();
            row.splice(index, 1, val);
          }
        });
      });
      this.isUpper = !this.isUpper;
    }
  }
};
</script>

 <style lang="scss" scoped>
.keyboard {
  padding: 3% 1.8%;
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
    &.fn {
      flex: 1;
      background: #c1bbb4;
      color: #716d65;
    }
    i {
      pointer-events: none;
      font-size: 1.25rem;
      &.capslock.isUpper {
        color: $global-font-color;
      }
    }
  }
}
</style>