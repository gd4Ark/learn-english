export default {
    update: {
        item: [{
            label: "旧密码",
            key: "old_password",
            type: "password",
        }, {
            label: "新密码",
            key: "new_password",
            type: "password",
        }, {
            label: "新密码",
            key: "new_password2",
            type: "password",
        }, ],
        data: () => ({
            old_password: "",
            new_password: "",
            new_password2: "",
        })
    }
}