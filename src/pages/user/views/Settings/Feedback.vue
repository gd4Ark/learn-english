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
        :formItem="$formData.feedback.base.item"
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
import { mapActions } from "vuex";
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
    formData: {}
  }),
  mounted() {
    this.formData = this.$formData.feedback.base.data();
  },
  methods: {
    ...mapActions(["feedback"]),
    async submit() {
      const { message } = this.formData;
      if (!message || message.length < 15) {
        return this.$util.msg.warning("描述不得少于15字");
      }
      await this.feedback({
        type: this.type,
        ...this.formData
      });
      this.$util.msg.success("提交成功");
      this.$router.back();
    }
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
