import Vue from 'vue'

import config from "@/common/config/config";
Vue.prototype.$config = config;

import ElementUI from 'element-ui';

import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

import App from '@/common/App'

import router from './router/index';

import store from './store/index'

import util from "@/common/util/util";
Vue.use(util);

import formData from "@/common/formData/index";

Vue.use(formData);

import axios from "@/common/util/axios";

Vue.use(axios, {
  router,
  useToekn: false,
});

import Back from "@/common/components/Back";
Vue.component('Back', Back);

import Wrap from "@/common/layouts/Wrap";
Vue.component('Wrap', Wrap);

import PopWrap from "@/common/layouts/PopWrap";
Vue.component('PopWrap', PopWrap);

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
  store,
}).$mount('#app')