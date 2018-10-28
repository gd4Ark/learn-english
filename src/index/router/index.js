import Vue from 'vue'
import VueRouter from 'vue-router';

// 普通层
import Learn from "@/index/pages/learn";
import Rank from "@/index/pages/rank";
import DayRank from "@/index/pages/ranks/day_rank";
import TotalRank from "@/index/pages/ranks/total_rank";
// 遮罩层
import Learning from "@/index/pages/learning";
import Submit from "@/index/pages/submit";
// 学习模式
import partSpell from "@/index/pages/learning_modes/part_spell";

const config = {
    mode: process.env.NODE_ENV == 'development' ? 'history' : 'hash',
    // base: 'user',
    routes: [
        {
            path: "/",
            redirect: "/learn",
        },
        {
            path: "/learn",
            component: Learn,
        },
        {
            path: "/rank",
            component: Rank,
            redirect: "/rank/dayRank",
            children: [
                {
                    path: "/rank/dayRank",
                    component: DayRank,
                },
                {
                    path: "/rank/totalRank",
                    component: TotalRank,
                },
            ]
        },
        {
            path: "/learning",
            component: Learning,
            redirect: "/learning/part_spell",
            children: [
                {
                    path: "/learning/part_spell",
                    component: partSpell,
                },
            ]
        },
        {
            path: "/submit",
            component: Submit,
        },
    ]
}

Vue.use(VueRouter);

const router = new VueRouter(
    config
);

router.beforeEach((to, from, next) => {
    if (to.path.includes('/learning')) {
        const store = router.app.$options.store;
        store.dispatch('refreshSetting').then(() => {
            next();
        })
        return;
    }
    next();
});

export default router;