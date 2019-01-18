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
    updateSetting(state, data) {
        state.setting = {
            ...state.setting,
            ...data,
        }
    }
}