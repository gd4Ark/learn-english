import Vue from 'vue'
import vuex from 'vuex'

import createPersist from 'vuex-localstorage'

import book from "./modules/book";
import english from "@/common/store/modules/english";
import review from "./modules/review";
import rank from "./modules/rank";
import submit from "./modules/submit";

import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

Vue.use(vuex);

export default new vuex.Store({
    state: {
        book,
        english,
        review,
        rank,
        submit,
    },
    mutations: {
        ...mutations,
    },
    actions: {
        ...actions,
    },
    getters: {
        ...getters,
    },
    plugins: [createPersist({
        namespace: 'namespace-for-state',
        initialState: {},
        // ONE_WEEK
        expires: 7 * 24 * 60 * 60 * 1e3
    })]
})