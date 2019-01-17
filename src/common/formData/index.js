import book from "./modules/book";
import english from "./modules/english";
import adminLogin from "./modules/adminLogin";
import userSubmit from "./modules/userSubmit";
import updatePassword from "./modules/updatePassword";
import rank from "./modules/rank";
import feedback from "./modules/feedback";

export default {
    install(Vue) {

        Vue.prototype.$formData = {
            book,
            english,
            adminLogin,
            userSubmit,
            updatePassword,
            rank,
            feedback,
        };
    }
}