<template>
  <pop-wrap :useBack="false">
    <template slot="back">
      <back backPath="/review" />
    </template>
    <div class="app-content">
      <div class="info-container">
        <div class="info">
          <p>
            <strong>所在模块：</strong>
            <span>
              {{ submitInfo.review_module }}
            </span>
          </p>
          <p>
            <strong>单词数量：</strong>
            <span>
              {{ $util.numFormat(submitInfo.total) }}
            </span>
          </p>
          <p>
            <strong>平均时间：</strong>
            <span>
              {{ $util.timeFormat(submitInfo.time) }}
            </span>
          </p>
        </div>
      </div>
      <BaseForm
        btn="提交"
        :useBtn="true"
        :formItem="$formData.submit.base.item"
        :getFormData="$formData.submit.base.data"
        @submit="handleSubmit"
      />
    </div>
  </pop-wrap>
</template>
<script>
import BaseForm from "@/common/components/BaseForm";
import { mapActions, mapState } from "vuex";

export default {
  components: {
    BaseForm
  },
  methods: {
    ...mapActions(["submit"]),

    async handleSubmit(formData) {
      const { username } = formData;
      if (username.length > 6) {
        return this.$util.msg.warning("名字长度不可超过6位数！");
      }
      await this.submit({
        ...this.submitInfo,
        ...formData
      });
      await this.$util.msg.success("提交成功！");
      this.$router.push("/rank");
    }
  },
  computed: {
    ...mapState({
      submitInfo: "submit"
    })
  }
};
</script>
<style lang="scss" scoped>
.app-content {
  @include flex-column;
  .info-container {
    @include flex-column;
    @include sub-center;
    line-height: 2;
    height: 40%;
    font-size: 0.8rem;
    strong {
      font-size: 0.9rem;
    }
  }
}
</style>
