# 清技背单词

## 介绍

清技背单词是一款复习单词的 Web 应用，主要由教师提供单词，学生进行多项模块复习，并以完成每个单词的平均时间作为成绩进行排名，致力于提高学生的学习兴趣、课外复习的自主性。

本项目为多页应用，分为用户界面和管理界面两个入口文件。

>  此项目是我入门 Vue 的第一个练手项目，目前功能尚少，并且存在很多不足，后续会继续进行更新迭代。

## 预览

> 长得丑别吐槽啊哈哈~

### 管理界面

![](https://ws1.sinaimg.cn/large/006mS5wEgy1g02kvr1h2dj30p00duq4p.jpg)

### 用户界面

![](https://ws1.sinaimg.cn/large/006mS5wEgy1g02kw6gm80j30p00dujsg.jpg)

### 复习界面

![](https://ws1.sinaimg.cn/large/006mS5wEgy1g02kwd1mfdj30p00duq4u.jpg)

## 技术栈

### 前端

Vue2 + Vuex + Vue-router + Element UI + Axios + SCSS

### 后端

Lumen (PHP) + MySQL

## 实现功能

### 用户

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

### 管理

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

## 安装与使用

### 初始化

```shell
// 下载
git clone https://github.com/gd4Ark/learn_english.git
// 安装依赖
npm install
// 安装服务端依赖
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

**注：** 在开发模式中，只能调试一个页面，需在`vue.config.js`里面修改`current`变量的值。

## 作者

**清技背单词** © 4ark，根据许可证 [MIT](https://github.com/gd4Ark/learn-english/blob/master/LICENSE) 发布。

> [Blog](https://4ark.me/) · GitHub [@gd4Ark](https://github.com/gd4Ark)

## 最后

如果觉得我的项目还不错的话 ，就给个 star 鼓励一下吧~