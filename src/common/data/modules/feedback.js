export default {

    base: {
        item: [{
            label: "描述一下您的问题，请不要少于15个字",
            key: "message",
            type: "textarea",
            row: 10,
        }, {
            label: "您的联系方式（选填）",
            key: "contact",
            type: "text",
        }, ],
        data: () => ({
            message: "",
            contact: ""
        })
    },

    search: {
        item: [{
            label: "问题描述",
            key: "message",
            type: "text",
            operation: 'like',
        }, {
            label: "联系方式",
            key: "contact",
            type: "text",
            operation: 'like',
        }, ],
        data: () => ({
            message: "",
            contact: "",
        })
    }
}