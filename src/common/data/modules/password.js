export default {
    update: {
        item: [{
            label: "旧密码",
            key: "old_pass",
            type: "password",
        }, {
            label: "新密码",
            key: "new_pass",
            type: "password",
        }, {
            label: "新密码",
            key: "new_pass2",
            type: "password",
        }, ],
        data: () => ({
            old_pass: "",
            new_pass: "",
            new_pass2: "",
        })
    }
}