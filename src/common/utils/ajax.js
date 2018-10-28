import Axios from "axios";
import qs from 'qs';

Axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

export default ({ baseUrl }) => {
    return ({
        type = 'get',
        data = {},
        act,
        api = '',
    }) => {
        if (typeof type !== "string") return;
        if (!['post', 'get'].includes(type.toLocaleLowerCase())) {
            return;
        }
        const method = type;
        const is_post = method === 'post';
        const _data = is_post ? "data" : "params";
        data = {
            act,
            api,
            ...data,
        };
        if (is_post) {
            data = qs.stringify(data);
        }
        Axios.defaults.baseURL = baseUrl;
        return Axios({
            url: '/',
            method,
            [_data]: data,
        });
    }
}