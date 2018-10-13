localhost35
localhost36-- парсер

php yii migrate/up --migrationPath=@yii/rbac/migrations

корзина  
php yii migrate/up --migrationPath=copmonents/cart/src/migrations




php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations


php yii user/create admin@admin.com admin 11111111


добавить роли
https://packagist.org/packages/bahirul/yii2-rbac-adminlte




php ./yii rbac/migrate/create addadminrule

    public function safeUp()
    {
        $this->createRole('admin', 'admin has all available permissions.');
        $this->createRole('guest', 'only guest permissions.');
        $this->createRole('simpleuser', 'only simpleuser permissions.');
      //  $this->createRule('adminrule', 'Adminule');
    }
    
    public function safeDown()
    {
        echo "m180409_120830_addadminrule cannot be reverted.\n";
        $this->removeItem('admin');
        $this->removeItem('guest');
        $this->removeItem('simpleuser');
        //$this->removeItem('adminrule');
        return false;
    }

php yii rbac/migrate
    


// баланс
php yii migrate --migrationPath=vendor/komer45/yii2-balance/migrations




изменненные из gii !!
Playlist





/// верстка
frontend/web/js/script.min.js сделано unminifi

frontend/web/js/script.min.js   add    ReloaderBets.reupdate(this);  -- 6414




старые
        "philippfrenzel/yii2fullcalendar": "3.8.*",
        "kartik-v/yii2-widget-depdrop": "1.0.4",

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
