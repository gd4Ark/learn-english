import Vue from 'vue'
import vuex from 'vuex'
import Ajax from "@/common/utils/ajax";
import createPersist from 'vuex-localstorage'

import config from "@/common/config/config";

const baseUrl = `${config.url}/admin_server.php`;

const ajax = Ajax({
    baseUrl
});

Vue.use(vuex);

export default new vuex.Store({
    state: {
        user : {
            hasLogin : false,
            name : '',
            pass : '',
        },
        setting : {

        },
        wordBookId: null,
        wordBook: {},
        wordBookList: [],
    },
    mutations: {
        updateUserInfo(state,payload){
            state.user = payload.user;
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
    },
    actions: {
        userLogin({commit,state},user=false){
            if (!user) user = state.user;
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'admin',
                    api : 'login',
                    data : {
                        user,
                    },
                }).then(({ data }) => {
                    if (!data.success){
                        alert(data.msg);
                        return;
                    }
                    commit('updateUserInfo',{
                        user : {
                            hasLogin : true,
                            ...user,
                        }
                    });
                    resolve();
                }).catch((error)=>{
                    alert('登录出错！');
                })
            });
        },
        refreshWordBook({ commit, state }) {
            return new Promise((resolve, reject)=>{
                const id = state.wordBookId;
                if (!id){
                    return;
                }
                ajax({
                    type: 'get',
                    act: 'wordBook',
                    data : {
                        id,
                    },
                }).then(({ data }) => {
                    let result = {};
                    if (data.result){
                        result = data.result;
                    }
                    commit('updateWordBook', {
                        data: result,
                    })
                    resolve();
                }).catch((error)=>{
                    alert('获取单词出错');
                    commit('updateWordBook', {
                        data: {},
                    })
                    reject();
                })
            });
        },
        refreshWordBookList({ commit }) {
            return new Promise((resolve,reject)=>{
                ajax({
                    type: 'get',
                    act: 'wordBookList',
                }).then(({ data }) => {
                    let result = data.result || [];
                    commit('updateWordBookList', {
                        data: result,
                    })
                    resolve();
                }).catch((error)=>{
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
        updateSetting({ commit, state },setting) {
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'setting',
                    api : 'update',
                    data : {
                        ...setting,   
                    }
                }).then(({ data }) => {
                    alert('更新成功');
                    resolve();
                }).catch((error)=>{
                    alert('更新失败');
                    reject();
                })
            });
        },
        addWordBook({commit},title){
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'wordBookList',
                    api : 'add',
                    data : {
                        title,
                    },
                }).then(({ data }) => {
                    resolve();
                }).catch((error)=>{
                    alert('添加单词本失败，请重新尝试！');
                    reject();
                })
            });
        },
        delWordBook({commit},id){
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'wordBookList',
                    api : 'delete',
                    data : {
                        id,
                    },
                }).then(({ data }) => {
                    resolve();
                }).catch((error)=>{
                    alert('删除单词本失败，请重新尝试！');
                    reject();
                })
            });
        },
        updateWordBook({commit},item){
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'wordBookList',
                    api : 'update',
                    data : {
                        id : item.id,
                        title : item.title,
                    },
                }).then(({ data }) => {
                    resolve();
                }).catch((error)=>{
                    alert('编辑失败，请重新尝试！');
                    reject();
                })
            });
        },
        addEnglish({commit,state},englishs){
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'wordBook',
                    api : 'add',
                    data : {
                        id : state.wordBookId,
                        englishs,
                    },
                }).then(({ data }) => {
                    alert(
                        `插入单词${data.len}个,成功${data.count}个`
                    );
                    resolve();
                }).catch((error)=>{
                    alert('添加单词本失败，请重新尝试！');
                    reject();
                })
            });
        },
        delEnglish({commit,state},ids){
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'wordBook',
                    api : 'delete',
                    data : {
                        ids,
                    },
                }).then(({ data }) => {
                    alert(
                        `删除单词${data.len}个,成功${data.count}个`
                    );
                    resolve();
                }).catch((error)=>{
                    alert('删除失败，请重新尝试！');
                    reject();
                })
            });
        },
        updateEnglish({commit},item){
            return new Promise((resolve, reject)=>{
                ajax({
                    type: 'post',
                    act: 'wordBook',
                    api : 'update',
                    data : {
                        id : item.id,
                        english : item.english,
                        chinese : item.chinese,
                    },
                }).then(({ data }) => {
                    resolve();
                }).catch((error)=>{
                    alert('编辑失败，请重新尝试！');
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