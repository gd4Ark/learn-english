import Vue from 'vue'
import vuex from 'vuex'

import book from "./modules/book";
import english from "./modules/english";

import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

Vue.use(vuex);

export default new vuex.Store({
    state: {
        book,
        english,
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