export default {
    book(state, data) {
        state.book = this._vm.$util.cover(state.book, data)
    },
    english(state, data) {
        state.english = this._vm.$util.cover(state.english, data)
    },
    setting(state, data) {
        state.setting = data;
    },
    log(state, data) {
        state.log = this._vm.$util.cover(state.log, data)
    }
}