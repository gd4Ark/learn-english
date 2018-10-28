# 清技背单词

![](https://ws1.sinaimg.cn/thumbnail/9892fa7fgy1fwntybdlcij20mp0mpk2i.jpg)

## 前言

此项目是我用来入门Vue的一个练手项目，目前功能尚少，并且存在很多不足，后续会继续进行更新迭代。

## 技术选型

### 前端部分：

- 使用 Vue-cli 3.0 搭建开发环境
- 使用 Vue-router 进行前端路由控制
- 使用 Vuex存储应用状态（ 使用vuex-localstorage进行本地存储 ）
- 使用 Axios与服务端进行交互
- 使用 Scss 编写样式

### 后端部分：

- PHP
- Mysql

## 项目架构

### 主目录

```javascript
learn_english
├─.gitignore
├─README.md
├─babel.config.js
├─package-lock.json
├─package.json
├─vue.config.js
├─src // 前端源码
|  ├─index // 前台页面
|  ├─common // 公用部分
|  ├─admin // 后台页面
├─server
|   ├─admin_server.php // 后台服务入口
|   ├─user_server.php // 前台服务入口
|   ├─config // 配置
|   ├─common // 公用部分
|   ├─actions // api
```

### 数据库

![](https://ws1.sinaimg.cn/large/9892fa7fgy1fwnw1bfwnyj20m50cjdh8.jpg)

## 功能

已实现功能如下：

- 前台

  - 选择单词本

  - 学习模式
    - 拼写部分（单词）
  - 排行榜
    - 日榜
    - 总榜

- 后台

  - 单词本（增删改）
  - 单词（增删改查）

  - 修改设置
    - 排行榜榜限制人数
    - 拼写部分抽取比例



