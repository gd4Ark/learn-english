# 清技背单词

![](https://ws1.sinaimg.cn/thumbnail/9892fa7fgy1fwntybdlcij20mp0mpk2i.jpg)

## 前言

清技背单词是一款复习单词的 Web 应用，主要由教师提供单词，学生进行多项模块复习，并以完成每个单词的平均时间作为成绩进行排名，致力于提高学生的学习兴趣、课外复习的自主性。

>  此项目是我入门 Vue 的第一个练手项目，目前功能尚少，并且存在很多不足，后续会继续进行更新迭代。

## 技术栈

### 前端

Vue2 + Vuex + Vue-router + Element UI + Axios + Scss 

### 后端

Lumen (PHP) + Mysql

## 功能

### 前台

- 首页
  - 查看单词列表
  - 随机复习模块
  - 选择单词本
- 复习
  - 部分单词拼写
- 排行榜
  - 选择复习模块（每个复习模块有不同的排行榜）
- 设置
  - 帮助与反馈
  - 关于

### 后台

- 单词本管理（添加、删除、编辑、进入单词列表）
- 单词管理（添加、删除、编辑）
- 设置
  - 修改密码
  - 排行榜设置
    - 人数限制
  - 复习模块设置
    - 单词部分拼写
      - 填空比例
  - 反馈表
  - 关于
    - 更新日志表
  - 退出

## 部分运行截图

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvhtr28jj20ku11275i.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvik07vtj20ku112q47.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcviru305j20ku1123zc.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvivdsj4j20ku112wfs.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcviyr6qcj20ku112abg.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvj6pdayj20ku112gms.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvjgecq9j20ku11275t.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvjk79c8j20ku1120u8.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvjpqe4aj20ku112jsx.jpg)

![](http://ww1.sinaimg.cn/mw690/9892fa7fgy1fzcvjvbooij20ku1123zp.jpg)

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