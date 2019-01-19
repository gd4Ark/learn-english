export default {
    async getEnglish(context) {
        context.commit('updateEnglish', await this._vm.$axios.get('/english', context.getters.requestEnglishListData));
    },
    async englishKeyword(context, keyword = []) {
        context.commit('updateEnglish', {
            keyword,
        });
    },
    async resetEnglishSearchData(context) {
        context.commit('updateEnglish', {
            searchData: this._vm.$formData.english.searchData(),
        });
    },
    async getSetting(context) {
        context.commit('updateSetting', await this._vm.$axios.get('/setting'));;
    }
}