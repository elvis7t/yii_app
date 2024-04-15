<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 </h1>
    <br>
</p>

# [Yii 2](https://www.yiiframework.com/) From Beginner to Expert
Udemy course :   application best for
developing complex Web applications with multiple tiers.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)


This project consists of two applications: a panel for managing users, projects, testimonials and blog, and a project portfolio website

### ✨ Features
- [x] List all users
- [x] Register user
- [x] Delete user
- [x] Change user
- [x] List all projects and images
- [x] Register project and images
- [x] Delete project and images
- [x] Change project and images
- [x] List all testimonials and user image
- [x] Register testimonial and user image
- [x] Delete testimonials and user image
- [x] Change testimonials and user image
- [x] List all posts blog
- [x] Register post blog
- [x] Delete post blog
- [x] Change post blog
- [x] RBCA

## 🚀 Starting

These instructions will allow you to get a copy of the project running on your local machine for development and testing purposes.


### ✔️ Prerequisites

* Docker installed and configured
* Git installed and configured

### 🛠️ Installation

Clone the repository locally:

```bash
git clone https://github.com/elvis7t/yii_app.git
```
Access the project folder
```bash
cd yii_app
```

Start containers: 🐋

```bash
docker-compose up -d
```
---
### ⚙️ Settings

### 1. *Configuring the dashboard* 📶
Access the panel container:
```bash
docker exec -ti panel-container /bin/bash
```
start the panel:

```bash
php init
0
yes
composer install
```
---

### 2. *Configuring the portfolio*
Access the portfolio container: 🌐
```bash
docker exec -ti yii-container /bin/bash
```
start the portfolio:

```bash
php init
0
yes
composer install
```
---
### 🔗 *Accesses*

* Access the Panel at:
[http://localhost:82/](http://localhost:82/)
* Access the Portfolio at:
[http://localhost:82/](http://localhost:85/)
* Access PhpMyAdmin at:
[http://localhost:8080/](http://localhost:8080/)


## Users

#### PhpMyAdmin
```
user: root
pass: root
```
## Panel

admin
```
Full access 🔓
email: admin@system.com
pass 123123
```
jhon

```
Blog  access🔒
email: blogmanager@system.com
pass 123123
```
### 🤖 Technologies

The following 🔌 plugins were used to build the project::

- [hail812/yii2-adminlte3](https://github.com/muyuym/yii2-adminlte3)
- [DataPicker yii2-jui](https://www.yiiframework.com/extension/yiisoft/yii2-jui)
- [Krajee FileInput](https://plugins.krajee.com/file-input#translations)
- [Krajee Star-rating](https://plugins.krajee.com/widget-details/star-rating)
- [yii2-imagine](https://www.yiiframework.com/extension/yiisoft/yii2-imagine)
- [fedemotta/yii2-widget-datatables](https://github.com/fedemotta/yii2-widget-datatables)
- [nullref/yii2-datatables](https://github.com/NullRefExcep/yii2-datatables/blob/master/src/DataTable.php)
- [DOTENV](https://github.com/vlucas/phpdotenv)

## 📝 Notes 
Make sure you have ports 82, 85, and 8080 available on your local system to access the Yii dashboard and app.


---
⌨️ with ❤️ to [Elvis Leite](https://gist.github.com/elvis7t) 😊