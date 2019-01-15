export default {
    formItem: [{
        label: "中文",
        key: "chinese",
        type: "text",
    }, {
        label: "英文",
        key: "english",
        type: "text",
    }, ],

    formData() {
        return {
            chinese: "",
            english: "",
        }
    },

    searchformItem: [{
        label: "中文",
        key: "chinese",
        type: "text",
        operation: 'like',
    }, {
        label: "英文",
        key: "english",
        type: "text",
        operation: 'like',
    }, {
        label: "排序",
        key: "sort",
        type: "select",
        operation: '=',
        options: [{
                label: '默认',
                value: '',
            },
            {
                label: '英文',
                value: 'english',
            },
            {
                label: '中文',
                value: 'chinese',
            }
        ]
    }, ],

    searchData() {
        return {
            chinese: "",
            english: "",
            sort: "",
        }
    }
}