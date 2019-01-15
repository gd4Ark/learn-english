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
    async getRank(context) {
        context.commit('updateRank', await this._vm.$axios.get('/rank',context.getters.requestRankData));
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
            searchData: this._vm.$formData.english.searchData(),
        });
    },
}