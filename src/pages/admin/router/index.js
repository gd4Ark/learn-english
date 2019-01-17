import Vue from 'vue'
import VueRouter from 'vue-router';

import Book from '@/pages/admin/views/Book';
import English from '@/pages/admin/views/English';

import Setting from '@/pages/admin/views/Setting';

import Password from '@/pages/admin/views/Settings/Password';
import Rank from '@/pages/admin/views/Settings/Rank';
import Review from '@/pages/admin/views/Settings/Review';
import About from '@/pages/admin/views/Settings/About';
import Feedback from '@/pages/admin/views/Settings/Feedback';


import Login from '@/pages/admin/views/Login';

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
            name: 'setting',
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
            }, {
                path: "rank",
                component: Rank,
                meta: {
                    title: '排行榜设置',
                }
            }, {
                path: "review",
                component: Review,
                name: 'setting/review',
                meta: {
                    title: '复习模块设置',
                }
            }, {
                path: "about",
                component: About,
                meta: {
                    title: '关于',
                }
            },
            {
                path: "feedback",
                component: Feedback,
                meta: {
                    title: '帮助与反馈',
                }
            }]
        },
        {
            path: "/login",
            component: Login,
            meta: {
                title: '登录',
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