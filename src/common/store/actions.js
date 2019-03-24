export default {
    async getEnglish(ctx) {
        ctx.commit('english', await this._vm.$axios.get('/english', ctx.getters.requestEnglishData));
    },
    async getSetting(ctx) {
        ctx.commit('setting', await this._vm.$axios.get('/setting'));
    },

    async resetSearchData(ctx, module) {
        ctx.commit(module, {
            search_data: this._vm.$v_data[module].search.data(),
        });
    },
    async updateSearchKeyword(ctx, {
        module,
        search_keyword = []
    }) {
        ctx.commit(module, {
            search_keyword,
        });
    }
}