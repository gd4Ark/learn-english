export default {
    install(Vue) {

        let vm = Vue.prototype;

        let config = vm.$config;

        const o = {};

        o.on = (elem, type, handle) => {
            elem.addEventListener(type, handle);
        }

        o.random = (start, end) => {
            return Math.floor(Math.random() * (end - start) + start);
        }

        o.getImgUrl = (url) => {
            return config.server_url + url;
        }

        o.isString = (str) => {
            return typeof (str) === "string";
        }

        o.isUpper = (str) => {
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

        o.timer = (() => {

            const timers = [];

            const add = (id, cooldown) => {
                if (timers[id]) {
                    return console.error('id 已存在！');
                }
                timers[id] = {
                    cooldown,
                    cd: cooldown,
                }
                return {
                    update: callback => {
                        timers[id].update = callback;
                    },
                }
            }

            const remove = (id) => {
                delete timers[id];
            }

            const update = () => {
                for (const item of Object.values(timers)) {
                    item.cd--;
                    if (!item.cd) {
                        item.cd = item.cooldown;
                        item.update();
                    }
                }
                requestAnimationFrame(update);
            }

            update();

            return {
                add,
                remove,
            }


        })();

        o.numFormat = (num) => {
            return num < 10 ? '0' + num : num;
        }

        o.timeFormat = (time) => {
            const m = Math.floor(time / 60);
            const s = time % 60;
            return `${o.numFormat(m)}:${o.numFormat(s)}`;
        };

        Vue.prototype.$util = o;
    }
}