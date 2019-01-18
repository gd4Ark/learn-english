<template>
  <div v-if="load">
    <!-- 选择类型 -->
    <el-select
      v-if="item.type === 'select'"
      v-model="val"
      placeholder="请选择"
      :clearable="true"
    >
      <el-option
        v-for="option in item.options"
        :key="option.value"
        :label="option.label"
        :value="option.value"
      >
      </el-option>
    </el-select>
    <!-- 日期类型 -->
    <el-date-picker
      v-else-if="item.type === 'date'"
      v-model="val"
      type="date"
      :editable="false"
      placeholder="请选择日期"
      value-format="yyyy-MM-dd"
      clearable
    >
    </el-date-picker>
    <!-- 滑块类型 -->
    <el-slider
      v-else-if="item.type === 'range'"
      v-model="val"
      :step="item.step"
      :min="item.min"
      :max="item.max"
      show-input
      input-size="mini"
    >
    </el-slider>
    <!-- 计数类型 -->
    <el-input-number
      v-else-if="item.type === 'inputNumber'"
      v-model="val"
      :step="item.step"
      :min="item.min"
      :max="item.max"
    >
    </el-input-number>
    <!-- 普通文本框 -->
    <el-input
      v-else
      :type="item.type"
      :placeholder="item.label"
      :rows="item.row"
      :min="item.min"
      :max="item.max"
      v-model="val"
    ></el-input>
  </div>
</template>
<script>
export default {
  props: {
    item: Object,
    model: [String, Number]
  },
  data: () => ({
    load: false,
    val: ""
  }),
  mounted() {
    this.val = this.model;
    this.load = true;
  },
  watch: {
    val(val) {
      this.$emit("update:model", val);
    },
    model(val) {
      if (this.val !== val) {
        this.val = val;
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.el-form-item__content div {
  display: block;
}
.el-form-item {
  margin-bottom: 12px;
}
</style>