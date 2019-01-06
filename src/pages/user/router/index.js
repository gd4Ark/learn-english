import Vue from 'vue'
import VueRouter from 'vue-router';

import index from '@/pages/user/views/index';
import review from '@/pages/user/views/review';
import rank from '@/pages/user/views/rank';
import english from '@/pages/user/views/english';

import partial_spell from '@/pages/user/views/review/partial_spell';

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
            icon: "el-icon-ali-homefill",
            inNav : true,
        }
    }, {
        path: "/review",
        component: review,
        meta: {
            title: '复习',
            icon: "el-icon-ali-learning_fill",
            inNav : true,
        }
    }, {
        path: "/rank",
        component: rank,
        meta: {
            title: '排行榜',
            icon: "el-icon-ali-rankfill",
            inNav : true,
        }
    }, {
        path: "/english",
        component: english,
        meta: {
            title: '单词列表',
        }
    }, {
        path: "/partial_spell",
        component: partial_spell,
        meta: {
            title: "英文部分拼写",
        }
    }]
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