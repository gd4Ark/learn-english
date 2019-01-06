import Vue from 'vue'

import config from "@/common/config/config";
Vue.prototype.$config = config;

import ElementUI from 'element-ui';

import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

import App from './App.vue'

import router from './router/index';

import store from './store/index'


import localStore from "@/common/util/localStore";
Vue.use(localStore);

import util from "@/common/util/util";
Vue.use(util);

import runtime_data from "@/common/runtime_data/index";

Vue.use(runtime_data);

import axios from "@/common/util/axios";

Vue.use(axios, {
  router,
  useToekn: true,
});

import back from "@/common/components/back";
Vue.component('back',back);

import wrap from "@/common/layouts/wrap.vue";
Vue.component('wrap',wrap);

import popWrap from "@/common/layouts/pop_wrap.vue";
Vue.component('popWrap',popWrap);

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
  store,
}).$mount('#app')