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
              {{ submitInfo.module }}
            </span>
          </p>
          <p>
            <strong>单词数量：</strong>
            <span>
              {{ $util.numFormat(submitInfo.total) }}
            </span>
          </p>
          <p>
            <strong>所需时间：</strong>
            <span>
              {{ $util.timeFormat(submitInfo.time) }}
            </span>
          </p>
        </div>
      </div>
      <c-form
        :formItem="$runtime_data.userSubmit.formItem"
        :formData="formData"
      >
        <el-col :offset="9">
          <el-button
            type="primary"
            @click="handleSubmit"
          >提 交</el-button>
        </el-col>
      </c-form>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/form";
import { async } from "q";
import { mapActions, mapState } from "vuex";

export default {
  components: {
    cForm
  },
  data: () => ({
    formData: {
      username: ""
    }
  }),
  mounted() {
    if (this.submitInfo.username) {
      this.formData.username = this.submitInfo.username;
    }
  },
  methods: {
    ...mapActions(["submit"]),

    async handleSubmit() {
      const { username } = this.formData;
      if (!username) {
        return this.$util.msg_error("请填写完整！");
      }
      const response = await this.submit({
        ...this.submitInfo,
        ...this.formData
      });
      console.log(response);
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
