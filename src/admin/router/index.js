import Vue from 'vue'
import VueRouter from 'vue-router';

// 普通层
import Login from "@/admin/pages/login";

import Index from "@/admin/pages/index";

import AddWordList from "@/admin/pages/addWordList";

import WordList from "@/admin/pages/wordList";

import AddEnglish from "@/admin/pages/addEnglish";

import Setting from "@/admin/pages/setting";

const config = {
    mode: process.env.NODE_ENV == 'development' ? 'history' : 'hash',
    // base: 'admin',
    routes: [
        {
            path: "/",
            redirect: "/index",
        },
        {
            path: "/login",
            component: Login,
        },
        {
            path: "/index",
            component: Index,
        },
        {
            path: "/addWordList",
            component: AddWordList,
        },
        {
            path: "/wordList",
            component: WordList,
        },
        {
            path: "/addEnglish",
            component: AddEnglish,
        },
        {
            path: "/setting",
            component: Setting,
        },
    ],
}

Vue.use(VueRouter);

const router = new VueRouter(
    config
);

router.beforeEach((to, from, next) => {
    if (to.path === '/login') {
        next();
        return;
    }
    const store = router.app.$options.store;
    const hasLogin = store.state.user.hasLogin;
    if (hasLogin) {
        store.dispatch('userLogin').then(() => {
            next();
        });
    } else {
        next({
            path: '/login',
        });
    }
});

export default router;