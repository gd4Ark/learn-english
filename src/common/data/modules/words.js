export default {
    add: {
        item: [
            {
                label: '单词列表',
                key: 'word_list',
                type: 'textarea',
                placeholder:
                    '请按格式输入需要添加的单词\n中英文之间用:(英语符号)隔开，每组单词用换行隔开\n如：Apple:苹果',
                disabledEvent: true,
                row: 15,
                rules: [
                    {
                        required: true,
                        trigger: 'blur'
                    }
                ]
            }
        ],
        data: () => ({
            word_list: ''
        })
    },

    search: {
        item: [
            {
                label: '中文',
                key: 'chinese',
                type: 'text',
                operation: 'like'
            },
            {
                label: '英文',
                key: 'english',
                type: 'text',
                operation: 'like'
            }
        ],
        data: () => ({
            chinese: '',
            english: ''
        })
    }
}
