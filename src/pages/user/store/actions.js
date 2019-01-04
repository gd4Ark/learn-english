export default {
    async getBook(context) {
        context.commit('updateBook', await this._vm.$axios.get('/book'));
    },
    async getEnglish(context) {
        context.commit('updateEnglish', await this._vm.$axios.get('/english', context.getters.requestEnglishListData));
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