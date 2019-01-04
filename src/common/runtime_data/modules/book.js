export default {
    formItem: [{
        label: "名字",
        key: "name",
        type: "text",
    }, ],

    formData() {
        return {
            name: "",
        }
    },

    searchformItem: [{
        label: "名字",
        key: "name",
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
                label : '名字',
                value : 'name',
            },
            {
                label : '单词数',
                value : 'english_count',
            }
        ]
    }, ],

    searchData() {
        return {
            name: "",
            sort : "",
        }
    }
}