export default {
    async getBook(context) {
        context.commit('updateBook', await this._vm.$axios.get('/book'));
    },
    async getEnglish(context) {
        context.commit('updateEnglish', await this._vm.$axios.get('/english', context.getters.requestEnglishListData));
    },
    async getReview(context) {
        context.commit('updateReview', await this._vm.$axios.get('/english', context.getters.requestReivewListData));
    },
    async submit(context,data) {
        const response =  await this._vm.$axios.post('/submit',{
            ...context.getters.submitData,
            ...data,
        });
        return response;
    },
    async englishKeyword(context, keyword = []) {
        await context.commit('updateEnglish', {
            keyword,
        });
    },
    async resetEnglishSearchData(context) {
        await context.commit('updateEnglish', {
            searchData: this._vm.$runtime_data.english.searchData(),
        });
    },
}