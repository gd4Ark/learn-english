export default {
    updateBook(state, data) {
        state.book = {
            ...state.book,
            ...data,
        }
    },
    updateEnglish(state, data) {
        state.english = {
            ...state.english,
            ...data,
        }
    },
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
}