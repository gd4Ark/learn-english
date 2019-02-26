export default {

    base: {
        item: [{
            label: "版本",
            key: "version",
            type: "text",
        }, {
            label: "修复",
            key: "fix",
            type: "textarea",
            row: 4,
        }, {
            label: "更新",
            key: "feat",
            type: "textarea",
            row: 4,
        }, ],
        data: () => ({
            version: "",
            fix: "",
            feat: "",
        })
    },

    search: {
        item: [{
            label: "版本",
            key: "version",
            type: "text",
            operation: 'like',
        }, {
            label: "修复",
            key: "fix",
            type: "text",
            operation: 'like',
        }, {
            label: "更新",
            key: "feat",
            type: "text",
            operation: 'like',
        }, ],
        data: () => ({
            version: "",
            feat: "",
            fix: "",
        })
    }
}