<template>
    <div class="keyboard"
         @click="keyDown">
        <div class="row" v-for="keys in keyboard">
          <template  v-for="key in keys">
            <button class="key" v-if="iskey(key)">{{key}}</button>
            <button :class="['key',key === '\u21e7' ? 'caseChange' : 'del']" v-else>{{ key }}</button>
          </template>
        </div>
    </div>
</template>
<script>
export default {
  data(){
    return {
      keyboard:[
        ["q","w","e","r","t","y","u","i","o","p"],
        ["a","s","d","f","g","h","j","k","l"],
        ["\u21E7","z","x","c","v","b","n","m","ㄨ"]
      ],
      lowerCase: true
    }
  },
  methods: {
    keyDown(e) {
      const target = e.target
      const list = target.classList
      const key = list.contains('del') ? 'del' : list.contains('caseChange') ? "caseChange" : target.innerHTML
      if (!list.contains('key')) return
      this.$emit('keydown',key);
    },
    iskey(key){
      return /\w$/.test(key);
    },
    caseChange(){
      this.lowerCase = !this.lowerCase;
      for(var i = 0; i < this.keyboard.length; i++){
        for(var j = 0; j < this.keyboard[i].length; j++){
          this.keyboard[i].splice(j,1,this.lowerCase ? this.keyboard[i][j].toLowerCase() : this.keyboard[i][j].toUpperCase());
        }
      }
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
  .key{
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
    &.del,&.caseChange{
      flex: 1;
      background: #c1bbb4;
      color: #716d65;
    }
  }
}
</style>
