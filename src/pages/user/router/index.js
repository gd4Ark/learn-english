import Vue from 'vue'
import VueRouter from 'vue-router';

import index from '@/pages/user/views/index';
import learn from '@/pages/user/views/learn';
import rank from '@/pages/user/views/rank';
import english from '@/pages/user/views/english';

const routerConfig = {
    mode: process.env.NODE_ENV == 'development' ? 'history' : 'hash',
    routes: [{
        path: "/",
        redirect: '/index',
    }, {
        path: '/index',
        component: index,
        meta: {
            title: '首页',
        }
    }, {
        path: "/learn",
        component: learn,
        meta: {
            title: '练习',
        }
    }, {
        path: "/rank",
        component: rank,
        meta: {
            title: '排行榜',
        }
    }, {
        path: "/english",
        component: english,
        meta: {
            title: '单词列表',
        }
    }, ]
}

Vue.use(VueRouter);

const router = new VueRouter(
    routerConfig,
);

router.beforeEach((to, from, next) => {
    if (to.meta.title) {
        document.title = to.meta.title;
    }
    next();
});

export default router;