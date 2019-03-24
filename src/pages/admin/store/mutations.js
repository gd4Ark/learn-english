import mutations from "@/common/store/mutations";
export default {
    ...mutations,
    feedback(state, data) {
        state.feedback = this._vm.$util.cover(state.feedback, data)
    }
}