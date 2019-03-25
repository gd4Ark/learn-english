import mutations from "@/common/store/mutations";
export default {
    review(state, data) {
        state.review = this._vm.$util.cover(state.review, data)
    },
    rank(state, data) {
        state.rank = this._vm.$util.cover(state.rank, data)
    },
    submit(state, data) {
        state.submit = this._vm.$util.cover(state.submit, data)
    },
    ...mutations,
}