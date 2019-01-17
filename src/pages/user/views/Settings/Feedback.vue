<template>
  <pop-wrap>
    <div class="app-content">
      <el-radio-group v-model="type">
        <el-radio
          v-for="(item,index) in options"
          :key="index"
          :label="item.value"
        >{{ item.text }}</el-radio>
      </el-radio-group>
      <c-form
        :showLabel="false"
        :formItem="$formData.feedback.formItem"
        :formData="formData"
      />
      <el-button
        type="primary"
        @click="submit"
      >提 交</el-button>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/Form";
export default {
  components: {
    cForm
  },
  data: () => ({
    type: 0,
    options: [
      {
        value: 0,
        text: "遇到问题"
      },
      {
        value: 1,
        text: "新功能建议"
      }
    ],
    formData: {
      message: "",
      contact: ""
    }
  }),
  methods: {
    submit() {}
  }
};
</script>
<style lang="scss" scoped>
.el-radio-group {
  padding: 3% 0;
  width: 100%;
  height: 15%;
  @include sub-center;
}
button {
  width: 100%;
}
</style>
