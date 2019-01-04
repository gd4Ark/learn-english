<template>
  <el-form
    v-if="formData"
    ref="form"
    label-width="65px"
  >

    <el-form-item
      v-for="(item,index) in formItem"
      :key="index"
      :label="item.label"
    >

      <!-- 一行多个 -->
      <template v-if="item.items">
        <template v-for="(it,index) in item.items">
          <el-col
            v-if="index>0"
            class="line"
            :span="2"
          >-</el-col>
          <el-col :span="11">
            <form-item
              :item="item"
              :key="index"
              :model.sync="formData[item.key][index]"
            />
          </el-col>
        </template>
      </template>

      <!-- 一行一个 -->
      <template v-else>
        <form-item
          :item="item"
          :model.sync="formData[item.key]"
        />
      </template>

    </el-form-item>

    <slot></slot>

  </el-form>
</template>
<script>
import FormItem from "@/common/components/formItem";
export default {
  props: {
    formData: Object,
    formItem: Array
  },
  components: {
    FormItem
  }
};
</script>
<style lang="scss" scoped>
.line {
  display: block;
  text-align: center;
}
</style>
