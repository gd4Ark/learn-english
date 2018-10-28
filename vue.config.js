module.exports = {
  baseUrl: './',
  pages: {
    admin: {
      entry: 'src/admin/main.js',
      template: 'src/common/index.html',
      filename: 'admin.html',
    },
    index: {
      entry: 'src/index/main.js',
      template: 'src/common/index.html',
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