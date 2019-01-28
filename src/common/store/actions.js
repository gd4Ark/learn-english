export default {
    async getEnglish(context) {
        context.commit('updateEnglish', await this._vm.$axios.get('/english', context.getters.requestEnglishListData));
    },
    async getSetting(context) {
        context.commit('updateSetting', await this._vm.$axios.get('/setting'));;
    },

    async resetSearchData(context, module) {
        context.commit(`update${this._vm.$util.firstUpperCase(module)}`, {
            searchData: this._vm.$formData[module].searchData(),
        });
    },
    async updateKeyword(context, {
        module,
        keyword = []
    }) {
        context.commit(`update${this._vm.$util.firstUpperCase(module)}`, {
            keyword,
        });
    }
}