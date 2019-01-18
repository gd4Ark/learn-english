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
    async getBook(context) {
        context.commit('updateBook', await this._vm.$axios.get('/book', context.getters.requestBookListData));
    },
    async getEnglish(context) {
        context.commit('updateEnglish', await this._vm.$axios.get('/english', context.getters.requestEnglishListData));
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
    async bookKeyword(context, keyword = []) {
        await context.commit('updateBook', {
            keyword,
        });
    },
    async resetBookSearchData(context) {
        await context.commit('updateBook', {
            searchData: this._vm.$formData.book.searchData(),
        });
    },
    async englishKeyword(context, keyword = []) {
        await context.commit('updateEnglish', {
            keyword,
        });
    },
    async resetEnglishSearchData(context) {
        await context.commit('updateEnglish', {
            searchData: this._vm.$formData.english.searchData(),
        });
    },
}