import mutations from "@/common/store/mutations";
export default {
    updateReview(state, data) {
        state.review = {
            ...state.review,
            ...data,
        }
    },
    updateRank(state, data) {
        state.rank = {
            ...state.rank,
            ...data,
        }
    },
    updateSubmit(state, data) {
        state.submit = {
            ...state.submit,
            ...data,
        }
    },
    ...mutations,
}