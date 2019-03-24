import actions from "@/common/store/actions";
export default {
    async getBook(ctx) {
        ctx.commit('book', await this._vm.$axios.get('/book'));
    },
    async getReview(ctx) {
        ctx.commit('review', await this._vm.$axios.get('/english', ctx.getters.requestReivewListData));
    },
    async getRank(ctx) {
        ctx.commit('rank', {
            data : await this._vm.$axios.get('/score', ctx.getters.requestRankData)
        });
    },
    async getLog(ctx) {
        ctx.commit('log', await this._vm.$axios.get('/log', {
            all: true,
        }));
    },
    async submit(ctx, data) {
        return await this._vm.$axios.post('/score', {
            ...ctx.getters.submitData,
            ...data,
        });
    },
    async feedback(ctx, data) {
        return await this._vm.$axios.post('/feedback', data);
    },
    ...actions,
}