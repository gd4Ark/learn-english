export default {
    admin: {
        item: [{
            label: "中文",
            key: "chinese",
            type: "text",
        }, {
            label: "英文",
            key: "english",
            type: "text",
        }, ],
        data: () => ({
            chinese: "",
            english: "",
        })
    },

    search: {
        item: [{
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
        data: () => ({
            chinese: "",
            english: "",
            sort: "",
        })
    }
}