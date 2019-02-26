import mutations from "@/common/store/mutations";
export default {
    ...mutations,
    updateFeedback(state, data) {
        state.feedback = {
            ...state.feedback,
            ...data,
        }
    }
}