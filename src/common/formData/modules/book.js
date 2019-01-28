export default {

    admin: {
        item: [{
            label: "名字",
            key: "name",
            type: "text",
        }, ],
        data: () => ({
            name: "",
        })
    },

    search: {
        item: [{
            label: "名字",
            key: "name",
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
                    label: '名字',
                    value: 'name',
                },
                {
                    label: '单词数',
                    value: 'english_count',
                }
            ]
        }, ],
        data: () => ({
            name: "",
            sort: "",
        }),
    }
}