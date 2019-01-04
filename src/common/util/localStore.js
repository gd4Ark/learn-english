import localStore from "store";



export default {
    install(Vue) {

        Vue.prototype.$localStore = localStore;
   
    }
}