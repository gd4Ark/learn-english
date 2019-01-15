import Vue from 'vue'
import VueRouter from 'vue-router';

import Book from '@/pages/admin/views/book';
import English from '@/pages/admin/views/english';

import Setting from '@/pages/admin/views/setting';
import Password from '@/pages/admin/views/setting/password';
import Rank from '@/pages/admin/views/setting/rank';


import Login from '@/pages/admin/views/login';

const routerConfig = {
    mode: process.env.NODE_ENV == 'development' ? 'history' : 'hash',
    routes: [{
            path: "/",
            redirect: "/book",
        },
        {
            path: "/index",
            redirect: "/book",
        },
        {
            path: "/book",
            component: Book,
            meta: {
                title: '单词本管理',
                icon: "el-icon-tickets",
                inNav: true,
            }
        },
        {
            path: "/english",
            component: English,
            meta: {
                title: '单词管理',
            }
        },
        {
            path: "/setting",
            component: Setting,
            name : 'setting',
            meta: {
                title: '设置',
                icon: "el-icon-ali-settings",
                inNav: true,
            },
            children: [{
                path: "password",
                component: Password,
                meta: {
                    title: '修改密码',
                }
            },{
                path: "rank",
                component: Rank,
                meta: {
                    title: '排行榜设置',
                }
            }]
        },
        {
            path: "/login",
            component: Login,
            meta: {
                title: '清技背单词后台 - 登录',
            }
        },
    ]
}

Vue.use(VueRouter);

const router = new VueRouter(
    routerConfig,
);

router.beforeEach((to, from, next) => {
    if (to.meta.title) {
        document.title = to.meta.title;
    }
    if (to.path === '/login') {
        next();
        return;
    }
    const store = router.app.$options.store;
    const localStore = router.app.$localStore;
    const user = localStore.get('user');
    if (user && user.token) {
        store.dispatch('checkLogin').then(() => {
            next();
        })
    } else {
        next({
            path: '/login',
        });
    }
});

export default router;