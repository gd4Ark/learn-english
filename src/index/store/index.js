import Vue from 'vue'
import vuex from 'vuex'
import Ajax from "@/common/utils/ajax";
import createPersist from 'vuex-localstorage'

import config from "@/common/config/config";

const baseUrl = `${config.url}/user_server.php`;

const ajax = Ajax({
    baseUrl
});

Vue.use(vuex);

export default new vuex.Store({
    state: {
        time: 0,
        setting : {

        },
        wordBookId: null,
        wordBook: {},
        wordBookList: [],
        dayRank: [],
        totalRank: [],
    },
    mutations: {
        updateTime(state, payload) {
            state.time = payload.time;
        },
        updateSetting(state,payload){
            state.setting = payload.setting;
        },
        updateWordBookId(state, payload) {
            state.wordBookId = payload.id;
        },
        updateWordBook(state, payload) {
            state.wordBook = payload.data;
        },
        updateWordBookList(state, payload) {
            state.wordBookList = payload.data;
        },
        updateDayRank(state, payload) {
            state.dayRank = payload.rank;
        },
        updateTotalRank(state, payload) {
            state.totalRank = payload.rank;
        },
    },
    actions: {
        refreshWordBook({ commit, state }) {
            return new Promise((resolve, reject) => {
                const id = state.wordBookId;
                if (!id) {
                    return;
                }
                ajax({
                    type: 'get',
                    act: 'wordBook',
                    data: {
                        id,
                    },
                }).then(({ data }) => {
                    let result = {};
                    if (data.result) {
                        result = data.result;
                    }
                    commit('updateWordBook', {
                        data: result,
                    })
                    resolve();
                }).catch((error) => {
                    alert('获取单词出错');
                    commit('updateWordBook', {
                        data: {},
                    })
                    reject();
                })
            });
        },
        refreshWordBookList({ commit }) {
            return new Promise((resolve, reject) => {
                ajax({
                    type: 'get',
                    act: 'wordBookList',
                }).then(({ data }) => {
                    let result = data.result || [];
                    commit('updateWordBookList', {
                        data: result,
                    })
                    resolve();
                }).catch((error) => {
                    alert('获取单词本列表出错');
                    commit('updateWordBookList', {
                        data: [],
                    })
                    reject();
                })
            });
        },
        refreshSetting({ commit, state }) {
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'get',
                    act: 'setting',
                }).then(({ data }) => {
                    commit('updateSetting', {
                        setting: data.result,
                    })
                    resolve();
                }).catch((error)=>{
                    alert('获取设置出错');
                    commit('updateSetting', {
                        setting : {}
                    });
                    reject();
                })
            });
        },
        refreshTotalRank({ commit, state }) {
            const clearRank = ()=>{
                commit('updateTotalRank',{
                    rank : [],
                })
            };
            return new Promise((resolve, reject) => {
                const id = state.wordBookId;
                if (!id) {
                    return;
                }
                ajax({
                    type: 'get',
                    act: 'rank',
                    api: 'total',
                    data: {
                        word_book_id: id,
                    },
                }).then(({ data }) => {
                    if (!data.result){
                        return clearRank();
                    }
                    commit('updateTotalRank', {
                        rank: data.result
                    });
                    resolve();
                }).catch((error) => {
                    alert('获取排行榜失败！');
                    clearRank();
                    reject();;
                })
            });
        },
        refreshDayRank({ commit, state }) {
            const clearRank = ()=>{
                commit('updateDayRank',{
                    rank : [],
                })
            };
            return new Promise((resolve, reject) => {
                const id = state.wordBookId;
                if (!id) {
                    return;
                }
                ajax({
                    type: 'get',
                    act: 'rank',
                    api: 'day',
                    data: {
                        word_book_id: id,
                    },
                }).then(({ data }) => {
                    if (!data.result){
                        return clearRank();
                    }
                    commit('updateDayRank', {
                        rank: data.result
                    });
                    resolve();
                }).catch((error) => {
                    alert('获取排行榜失败！');
                    clearRank();
                    reject();
                })
            });
        },
        submit({ commit, state }, name) {
            return new Promise((resolve, reject) => {
                ajax({
                    type: 'post',
                    act: 'userSubmit',
                    api: 'submit',
                    data: {
                        word_book_id: state.wordBookId,
                        time: state.time,
                        name: name,
                    }
                }).then(({ data }) => {
                    commit('updateTime', {
                        time: 0,
                    });
                    resolve();
                }).catch((error) => {
                    alert('提交出错，请重新尝试！');
                    reject();
                })
            });
        },
    },
    plugins: [createPersist({
        namespace: 'namespace-for-state',
        initialState: {},
        // ONE_WEEK
        expires: 7 * 24 * 60 * 60 * 1e3
    })]
})