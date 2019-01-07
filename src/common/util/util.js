export default {
    install(Vue) {

        let vm = Vue.prototype;

        let config = vm.$config;

        const o = {};

        o.getImgUrl = (url) => {
            return config.server_url + url;
        }

        o.isString = (str) => {
            return typeof (str) === "string";
        }

        o.isUpper = (str)=>{
            return /[A-Z]/.test(str);
        };

        o.isEmptyObj = (obj) => {
            return JSON.stringify(obj) === "{}";
        }

        o.numberToW = (num) => {
            return num / 10000 + 'w';
        }

        o.verifForm = (formObj) => {
            for (const key in formObj) {
                let el = formObj[key];
                el = ("" + el).trim();
                if (!el) {
                    return false;
                }
            }
            return true;
        };

        ['success', 'warning', 'error', 'info'].forEach(el => {
            const duration = 1000;
            o['msg_' + el] = (message) => {
                return new Promise((resolve) => {
                    vm.$message({
                        message,
                        type: el,
                        duration,
                        center: true,
                        showClose: true,
                        onClose: () => {
                            resolve();
                        }
                    });
                })
            };
        });

        o.confirm = (({
            title = '提示',
            content = '确定吗？',
        }) => {

            return new Promise((resolve, reject) => {
                vm.$confirm(content, title, {
                        confirmButtonText: "确定",
                        cancelButtonText: "取消",
                        type: "warning"
                    })
                    .then(() => {
                        resolve();
                    })
                    .catch(() => {
                        reject();
                    });
            })

        });

        o.clone = (obj) => (
            JSON.parse(JSON.stringify(obj))
        );

        o.isEqual = (obj1, obj2) => {
            return JSON.stringify(obj1) === JSON.stringify(obj2);
        }

        Vue.prototype.$util = o;
    }
}