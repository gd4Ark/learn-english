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
}