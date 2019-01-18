import actions from "@/common/store/actions";
export default {
    async getBook(context) {
        context.commit('updateBook', await this._vm.$axios.get('/book'));
    },
    async getReview(context) {
        context.commit('updateReview', await this._vm.$axios.get('/english', context.getters.requestReivewListData));
    },
    async getRank(context) {
        context.commit('updateRank', await this._vm.$axios.get('/rank', context.getters.requestRankData));
    },
    async submit(context, data) {
        return await this._vm.$axios.post('/submit', {
            ...context.getters.submitData,
            ...data,
        });
    },
    async feedback(context, data) {
        return await this._vm.$axios.post('/feedback',data);
    },
    ...actions,
}