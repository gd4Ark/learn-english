import book from "./modules/book";
import english from "./modules/english";
import adminLogin from "./modules/adminLogin";
import userSubmit from "./modules/userSubmit";

export default {
    install(Vue) {

        Vue.prototype.$runtime_data = {
            book,
            english,
            adminLogin,
            userSubmit,
        };
    }
}