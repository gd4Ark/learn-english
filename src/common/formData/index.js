import book from "./modules/book";
import english from "./modules/english";
import login from "./modules/login";
import submit from "./modules/submit";
import password from "./modules/password";
import rank from "./modules/rank";
import feedback from "./modules/feedback";
import log from "./modules/log";
import review from "./modules/review";

export default {
    install(Vue) {

        Vue.prototype.$formData = {
            book,
            english,
            login,
            submit,
            password,
            rank,
            feedback,
            log,
            review,
        };
    }
}