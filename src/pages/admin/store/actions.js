import actions from "@/common/store/actions";
export default {
    async login(context, data) {
        const response = await this._vm.$axios.post('/login', data);
        this._vm.$localStore.set('user', {
            token: response.data.token
        });
        return response;
    },
    async checkLogin() {
        return await this._vm.$axios.post('/checkLogin');
    },
    async logout() {
        return await this._vm.$axios.post('/logout');
    },
    async updatePassword(context, data) {
        return await this._vm.$axios.post('/password', data);
    },
    async updateSetting(context, data) {
        return await this._vm.$axios.post('/setting', data);
    },
    async getBook(context) {
        context.commit('updateBook', await this._vm.$axios.get('/book', context.getters.requestBookListData));
    },
    async addBook(context, data) {
        return await this._vm.$axios.put('/book', data);
    },
    async updateBook(context, data) {
        return await this._vm.$axios.post('/book', data);
    },
    async delBook(context, data) {
        return await this._vm.$axios.delete('/book', data);
    },
    async AddEnglish(context, data) {
        return await this._vm.$axios.put('/english', data);
    },
    async updateEnglish(context, data) {
        return await this._vm.$axios.post('/english', data);
    },
    async delEnglish(context, data) {
        return await this._vm.$axios.delete('/english', data);
    },
    async getFeedback(context) {
        context.commit('updateFeedback', await this._vm.$axios.get('/feedback', context.getters.requestFeedbackListData));
    },
    async delFeedback(context, data) {
        return await this._vm.$axios.delete('/feedback', data);
    },
    async feedbackKeyword(context, keyword = []) {
        context.commit('updateFeedback', {
            keyword,
        });
    },
    async resetFeedbackSearchData(context) {
        context.commit('updateFeedback', {
            searchData: this._vm.$formData.feedback.searchData(),
        });
    },
    async bookKeyword(context, keyword = []) {
        context.commit('updateBook', {
            keyword,
        });
    },
    async resetBookSearchData(context) {
        context.commit('updateBook', {
            searchData: this._vm.$formData.book.searchData(),
        });
    },
    ...actions,
}