### 云书签 CloudBookMark

Laravel + VueJS

此项目只是整个应用的的API部分，SPA部分请查看：[https://github.com/Qsnh/CloudBookMark-SPA](https://github.com/Qsnh/CloudBookMark-SPA)

## 安装说明

一、下载到本地：
```
git clone https://github.com/Qsnh/CloudBookMark.git
```
二、安装依赖
```
composer install
```

三、生成 `key`
```
php artisan key:generate
```

四、配置 `.env` 文件

五、安装数据表
```
php artisan migrate
```

六、安装 `Laravel Passport` 授权客户端
```
php artisan passport:install
```

七、配置前端App。

### 用户接口

方法 | 接口 | 解释
--- | --- | ---
POST | /oauth/token | 获取AccessToken
GET | /user | 获取用户信息
GET | /user?include=categories | 获取用户信息 + 分类
GET | /user?include=categories.bookmarks | 获取用户信息 + 分类 + 书签

## V2

> V2版本接口是在作者学习 `RESTful API` 设计的API接口，全局基本满足 `RESTful API` 的设计规范。同时也保留了V1版本。

### 分类接口

方法 | 接口 | code(success) | 解释
--- | --- | --- | ---
GET | /categories | 200 | 获取当前用户所有的分类
POST | /category | 201 | 创建分类
GET | /category/{id} | 200 | 获取ID的分类
PATCH | /category/{id} | 201 | 编辑分类
DELETE | /category/{id} | 204 | 删除分类

### 书签接口

方法 | 接口 | code(success) | 解释
--- | --- | --- | ---
GET | /bookmarks | 200 | 获取当前用户所有书签
GET | /bookmark/{id} | 204 | 删除书签
POST | /bookmark | 201 | 创建书签

> 留意彩蛋.


## V1

> V1版本在写这个项目的时候作者对于 `RESTful API` 了解不足，API的设计也有很多缺陷。

### 分类接口

方法 | 接口 | 解释
--- | --- | ---
GET | /api/v1/category | 获取所有分类
GET | /api/v1/category?include=bookmarks | 获取分类 + 书签
POST | /api/v1/category/add | 添加分类
GET | /api/v1/category/{id}/find | 查找单个分类
DELETE | /api/v1/category/{id}/delete | 删除分类
POST | /api/v1/category/{id}/edit | 编辑分类

### 书签接口

方法 | 接口 | 解释
--- | --- | ---
GET | /api/v1/bookmark | 获取书签
GET | /api/v1/bookmark?include=category | 获取书签 + 分类
POST | /api/v1/bookmark/add | 添加书签
DELETE | /api/v1/bookmark/{id}/delete | 删除书签

## 数据统一返回结构

```
{
    "code": 0 | 1,
    "error": success | error,
    "message": "说明信息",
    "data": object,
}
```

## 接口详细说明

#### 除了获取 `AccessToken` 接口，其他的 `API` 访问均需要在 `Request Header` 中加入：

```
Authorization:Bearer access_token
```

> 注意 Bearer 后面有个空格


#### `/oauth/token`

参数 | 说明 | 默认值
--- | --- | ---
grant_type | 授权方式 | password
client_id | 客户端ID | 空
client_secret | 客户端secret | 空
username | 用户名 | 空
password | 密码 | 空
scope | 权限范围 | 空

#### `/api/v1/category/add`

参数 | 说明 | 默认值
--- | --- | ---
category_name | 分类名 | 空

#### `/api/v1/category/{id}/edit`

参数 | 说明 | 默认值
--- | --- | ---
category_name | 分类名 | 空

#### `/api/v1/bookmark/add`

参数 | 说明 | 默认值
--- | --- | ---
category_id | 分类ID | 空
bookmark_name | 书签名 | 空
bookmark_url | 书签地址 | 空

## Over.

> 注意，所有的API均支持跨域操作，如要关闭，请进行如下操作：

第一、删除 `config/app.php` 中的 `Barryvdh\Cors\ServiceProvider::class,` 。

第二、删除 `app/Http/kernel.php` 中的 `\Barryvdh\Cors\HandleCors::class,` 。

===============================

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
