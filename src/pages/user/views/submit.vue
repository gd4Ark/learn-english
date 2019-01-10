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
            <span>英文部分拼写</span>
          </p>
          <p>
            <strong>单词数量：</strong>
            <span>28</span>
          </p>
          <p>
            <strong>所需时间：</strong>
            <span>00:50</span>
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
            @click="submit"
          >提 交</el-button>
        </el-col>
      </c-form>
    </div>
  </pop-wrap>
</template>
<script>
import cForm from "@/common/components/form";
import { async } from "q";
import { mapActions } from "vuex";

export default {
  data() {
    return {
      formData: {
        username: "",
        password: ""
      }
    };
  },
  components: {
    cForm
  },
  methods: {
    ...mapActions(["login"]),

    async submit() {
      const { username, password } = this.formData;
      if (!username || !password) {
        return this.$util.msg_error("请填写完整！");
      }
      const response = await this.login(this.formData);
      this.$router.push("/index");
    }
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
