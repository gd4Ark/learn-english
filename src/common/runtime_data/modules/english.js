export default {
    formItem: [{
        label: "英文",
        key: "english",
        type: "text",
    }, {
        label: "中文",
        key: "chinese",
        type: "text",
    }, ],

    formData() {
        return {
            english: "",
            chinese: "",
        }
    },

    searchformItem: [{
        label: "英文",
        key: "english",
        type: "text",
        operation: 'like',
    }, {
        label: "中文",
        key: "chinese",
        type: "text",
        operation: 'like',
    },{
        label: "排序",
        key: "sort",
        type: "select",
        operation: '=',
        options : [
            {
                label : '默认',
                value : '',
            },
            {
                label : '英文',
                value : 'english',
            },
            {
                label : '中文',
                value : 'chinese',
            }
        ]
    }, ],

    searchData() {
        return {
            english: "",
            chinese: "",
            sort : "",
        }
    }
}