import actions from "@/common/store/actions";
export default {
    async login(ctx, data) {
        const res = await this._vm.$axios.post('/login', data);
        this._vm.$localStore.set('login', {
            access_token: res.access_token
        });
        return res;
    },
    async checkLogin() {
        return await this._vm.$axios.post('/checkLogin');
    },
    async logout() {
        return await this._vm.$axios.post('/logout');
    },
    async updatePassword(ctx, data) {
        return await this._vm.$axios.put('/password', data);
    },
    async updateSetting(ctx, data) {
        return await this._vm.$axios.put(`/setting/1`, data);
    },
    async getBook({commit,state,getters}) {
        commit('book', await this._vm.$axios.get('/book', getters.requestData(state.book)));
    },
    async addBook(ctx, data) {
        return await this._vm.$axios.post('/book', data);
    },
    async updateBook(ctx, data) {
        return await this._vm.$axios.put(`/book/${data.id}`, data);
    },
    async delBook(ctx, data) {
        return await this._vm.$axios.delete('/book', data);
    },
    async addEnglish(ctx, data) {
        return await this._vm.$axios.post('/english', {
            ...data,
            book_id: ctx.state.english.book_id
        });
    },
    async updateEnglish(ctx, data) {
        return await this._vm.$axios.put(`/english/${data.id}`, data);
    },
    async delEnglish(ctx, data) {
        return await this._vm.$axios.delete('/english', data);
    },
    async getFeedback({commit,state,getters}) {
        commit('feedback', await this._vm.$axios.get('/feedback', getters.requestData(state.feedback)));
    },
    async delFeedback(ctx, data) {
        return await this._vm.$axios.delete('/feedback', data);
    },
    async getLog({commit,state,getters}) {
        commit('log', await this._vm.$axios.get('/log', getters.requestData(state.log)));
    },
    async addLog(ctx, data) {
        return await this._vm.$axios.post('/log', data);
    },
    async updateLog(ctx, data) {
        return await this._vm.$axios.put(`/log/${data.id}`, data);
    },
    async delLog(ctx, data) {
        return await this._vm.$axios.delete('/log', data);
    },
    ...actions,
}