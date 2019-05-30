export default {
    common: {
        item: [
            {
                label: '名称',
                key: 'name',
                type: 'text',
                rules: [
                    {
                        required: true,
                        trigger: 'blur'
                    }
                ]
            }
        ],
        data: () => ({
            name: ''
        })
    },

    search: {
        item: [
            {
                label: '名称',
                key: 'name',
                type: 'text',
                operation: 'like'
            }
        ],
        data: () => ({
            name: ''
        })
    }
}
