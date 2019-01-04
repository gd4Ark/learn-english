import axios from "axios";
import qs from 'qs';

export default {

    install(Vue, options) {

        let vm = Vue.prototype;
        
        let config = vm.$config;

        let router = options.router;

        const useToekn = options.useToekn;

        axios.defaults.baseURL = config.server_url + 'api';
        

        // 请求拦截器

        axios.interceptors.request.use(config => {
            // Add Token
            if (useToekn){
                const user = vm.$localStore.get('user');
                if (user && user.token) {
                    const stringifyStatus = ['get', 'delete'].includes(config.method);
                    let data = config[stringifyStatus ? 'params' : 'data'];
                    switch (true) {
                        // FormData
                        case data instanceof FormData:
                            data.append('token', user.token);
                            break;
                            // Params   
                        case stringifyStatus:
                            data.token = user.token;
                            break;
                            // Data    
                        default:
                            data = qs.parse(data);
                            data.token = user.token;
                            data = qs.stringify(data);
                            break;
                    }
                    config[stringifyStatus ? 'params' : 'data'] = data;
                }   
            }
            return config;
        }, err => {
            vm.$util.msg_error('请求超时!');
            return Promise.reject(err);
        });

        // 响应拦截器
        axios.interceptors.response.use(data => {
            return data.data;
        }, err => {
            const status = err.response.status;
            const message = err.response.data.message;
            switch (status) {
                case 401:
                    vm.$util.msg_error(message).then(() => {
                        router.push('/login');
                    });
                    break;
                case 403:
                case 404:
                case 405:
                    vm.$util.msg_error(message || '请求服务器失败！');
                    break;
                case 500:
                    vm.$util.msg_error('服务器发生错误！');
                    break;
            }
            return Promise.reject(err);
        })

        // 请求方法

        const get = (url, data = {}) => {
            return axios({
                method: 'get',
                url,
                params: data,
            });
        }

        const post = (url, data = {}) => {
            data = qs.stringify(data);
            return axios({
                method: 'post',
                url,
                data,
            });
        }

        const put = (url, data = {}) => {
            data = qs.stringify(data);
            return axios({
                method: 'put',
                url,
                data,
            });
        }

        const del = (url, data = {}) => {
            return axios({
                method: 'delete',
                url,
                params: data,
            });
        }

        const upload = (url, data = {}) => {
            return axios({
                method: 'post',
                url,
                data,
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            });
        }

        // 所有方法

        const methods = {
            get,
            post,
            put,
            delete: del,
            upload
        };

        // 封装函数

        const ax = {};

        Object.keys(methods).forEach((key) => {
            ax[key] = methods[key];
        });

        Vue.prototype.$axios = ax;

    }
}