<template>
    <wrap>
        <div id="setting">
            <div class="app-header">
                <router-link to="/index"
                             class="back"></router-link>
                <h2 class="title">设置</h2>
            </div>
            <div class="submit-container">
                <div class="form-group">
                    <label for="">日榜人数限制 ：</label>
                    <input id="name"
                           type="number"
                           class="form-input"
                           v-model="setting.day_rank_count">
                </div>
                <div class="form-group">
                    <label for="">总榜人数限制 ：</label>
                    <input id="name"
                           type="number"
                           class="form-input"
                           v-model="setting.total_rank_count">
                </div>
                <div class="form-group">
                    <label for="">单词字母比例 ：</label>
                    <input id="name"
                           type="number"
                           min="0"
                           max="1"
                           class="form-input"
                           v-model="setting.part_spell_proportion">
                </div>
                <button class="submit-btn big-btn"
                        @click="submit">更新</button>
            </div>
        </div>
    </wrap>
</template>
<script>
import Wrap from '@/common/layouts/admin_wrap'
export default {
  data() {
    return {
      setting() {
        
      }
    }
  },
  components: {
    Wrap
  },
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      this.$store.dispatch('refreshSetting').then(() => {
        this.setting = {
          ...this.$store.state.setting
        }
      })
    },
    submit() {
        const proportion = this.setting.part_spell_proportion;
        if (proportion<0||proportion>1){
          return alert('比例只能在0-1之间');
        }
        this.$store.dispatch('updateSetting',this.setting).then(()=>{
            this.refresh();
        });
    }
  }
}
</script>
<style lang="scss" scoped>
.form-group {
  > * {
    width: 50%;
    text-align: center;
  }
}
</style>

