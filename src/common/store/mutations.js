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
    },
    updateLog(state, data) {
        state.log = {
            ...state.log,
            ...data,
        }
    }
}