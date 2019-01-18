import Vue from 'vue'
import VueRouter from 'vue-router';

import Index from '@/pages/user/views/Index';
import Review from '@/pages/user/views/Review';
import Rank from '@/pages/user/views/Rank';
import English from '@/pages/user/views/English';

import Reviewing from '@/pages/user/views/Reviewing';

import PartialSpell from '@/pages/user/views/Reviewings/PartialSpell';

import Submit from '@/pages/user/views/Submit';

import Setting from "@/pages/user/views/Setting";
import About from '@/common/layouts/About';
import Feedback from "@/pages/user/views/Settings/Feedback";

// Abouts option
import Log from '@/pages/admin/views/Settings/Abouts/Log';
import App from '@/common/layouts/Abouts/App';
import We from '@/common/layouts/Abouts/We';


const routerConfig = {
    mode: process.env.NODE_ENV == 'development' ? 'history' : 'hash',
    routes: [{
        path: "/",
        redirect: '/index',
    }, {
        path: '/index',
        component: Index,
        meta: {
            title: '首页',
            icon: "el-icon-ali-homefill",
            inNav: true,
        }
    }, {
        path: "/review",
        component: Review,
        meta: {
            title: '复习',
            icon: "el-icon-ali-learning_fill",
            inNav: true,
        }
    }, {
        path: "/rank",
        component: Rank,
        meta: {
            title: '排行榜',
            icon: "el-icon-ali-rankfill",
            inNav: true,
        }
    }, {
        path: "/english",
        component: English,
        meta: {
            title: '单词列表',
        }
    }, {
        path: "/reviewing",
        component: Reviewing,
        children: [{
            path: "partialSpell",
            component: PartialSpell,
            meta: {
                title: '单词部分拼写',
            }
        }]
    }, {
        path: "/submit",
        component: Submit,
        meta: {
            title: '提交',
        }
    }, {
        path: "/setting",
        component: Setting,
        name: 'setting',
        meta: {
            title: '设置',
            icon: "el-icon-ali-settings",
            inNav: true,
        },
        children: [{
            path: "about",
            component: About,
            name: 'setting/about',
            meta: {
                title: '关于',
            },
            children: [{
                path: "log",
                component: Log,
                meta: {
                    title: '更新日志',
                }
            }, {
                path: "app",
                component: App,
                meta: {
                    title: '关于清技背单词',
                }
            }, {
                path: "we",
                component: We,
                meta: {
                    title: '关于开发者',
                }
            }, ]
        }, {
            path: "feedback",
            component: Feedback,
            meta: {
                title: '帮助与反馈',
            }
        }],
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