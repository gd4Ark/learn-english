export default {
    is_prod: process.env.NODE_ENV === 'production',
    app_name: process.env.APP_NAME,
    app_title: process.env.APP_TITLE,
    app_version: process.env.APP_VERSION,
    app_copyright: '© 2019 4ark. 版权所有',
    dev_server_url: `http://${location.hostname}/learn-english/server/public/`,
    server_url: `http://127.0.0.1/learn-english/server/public/`
}
