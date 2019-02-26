import getters from "@/common/store/getters";
export default {
    requestReivewListData(state) {
        const {
            book_id,
        } = state.english;
        const data = {
            book_id,
            review: true,
        };
        return data;
    },
    requestRankData(state) {
        const {
            review_module,
        } = state.rank;
        const {
            book_id,
        } = state.english;
        const data = {
            book_id,
            review_module,
        };
        return data;
    },
    submitData(state) {
        const {
            book_id,
        } = state.english;
        const data = {
            book_id,
        };
        return data;
    },
    ...getters,
}