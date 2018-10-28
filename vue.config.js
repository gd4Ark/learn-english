const isEnv = process.env.NODE_ENV == 'development';
const config = {
  baseUrl : isEnv ? '/' : './',
  pages: {
    admin: {
      entry: 'src/admin/main.js',
      filename: isEnv ? 'index.html' : 'admin.html',
    },
    index: {
      entry: 'src/index/main.js',
      filename: 'index.html',
    },
  },
  lintOnSave: false,
  css: {
    loaderOptions: {
      sass: {
        data: `@import "@/common/styles/app.scss";`
      }
    }
  }
};
module.exports = config;