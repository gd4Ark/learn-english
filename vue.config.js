const CompressionPlugin = require("compression-webpack-plugin");
const isDev = process.env.NODE_ENV == 'development';
const config = {
  baseUrl: isDev ? '/' : './',
  pages: {
    index: {
      entry: 'src/pages/admin/main.js',
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
  },
  configureWebpack: config => {
    if (!isDev) {
      return {
        plugins: [
          new CompressionPlugin({
            test: /\.js$|\.html$|.\css/,
            threshold: 10240,
            deleteOriginalAssets: false
          })
        ]
      }
    }
  },
};
module.exports = config;