import Vue from 'vue'
import vuex from 'vuex'

import book from "./modules/book";
import english from "@/common/store/modules/english";
import setting from "@/common/store/modules/setting";
import feedback from "./modules/feedback";
import log from "./modules/log";

import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

Vue.use(vuex);

export default new vuex.Store({
    state: {
        book,
        english,
        setting,
        feedback,
        log,
    },
    mutations: {
        ...mutations,
    },
    actions: {
        ...actions,
    },
    getters: {
        ...getters,
    }
})