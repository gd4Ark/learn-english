# 清技背单词

![](https://ws1.sinaimg.cn/thumbnail/9892fa7fgy1fwntybdlcij20mp0mpk2i.jpg)

## 前言

此项目是我入门 Vue 的第一个练手项目，目前功能尚少，并且存在很多不足，后续会继续进行更新迭代。

## 技术栈

### 前端

Vue2 + Vuex + Vue-router + Element UI + Axios + Scss 

### 后端

Lumen (PHP) + Mysql

## 使用

### 初始化

```shell
// 下载
git clone https://github.com/gd4Ark/learn_english.git
// 安装依赖
npm install
// 服务端代码安装依赖
cd server
composer install
```

### 进行相关配置：

1. 导入数据库（db.sql）。
2. 在`server/.env`中填写你的数据库信息。
3. 在`src/common/config/config.js`中填写你的IP地址（如不需局域网访问则填127.0.0.1）。

### 开始运行

```shell
// 开发模式
npm run serve
// 构建模式
npm run build
```

**注：**

1. **在开发模式中，只能调试一个页面，需在`vue.config.js`里面注释`pages`其中一项，如你有更好的解决方法欢迎提issue，感谢。**



如果你有任何疑问或不解，欢迎发送邮件（邮箱地址在我主页）。



最后，感谢您的观看！