
test
 
  
--- перезиписано
http://localhost35/uregistration/register   // форма регистрации  
  
  
  
  
localhost35
localhost36-- парсер

"dektrium/yii2-rbac": "1.0.0-alpha@dev",


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


// для новостей
php yii migrate --migrationPath=@snapget/news/migrations


изменненные из gii !!
Playlist





/// верстка
frontend/web/js/script.min.js сделано unminifi

frontend/web/js/script.min.js   add    ReloaderBets.reupdate(this);  -- 6414




старые
        "philippfrenzel/yii2fullcalendar": "3.8.*",
        "kartik-v/yii2-widget-depdrop": "1.0.4",







в вендоре поправить
C:/OSPanel/domains/atimur/loto/lotoproduction/vendor/yiisoft/yii2-authclient/src/OAuth2.php
примерно 118 строка
подставить у димы кидает ошыбки. попростить антона потестить у себя.
           // для гугла баг.
            if(0){
                if (!isset($incomingState) || empty($authState) || strcmp($incomingState, $authState) !== 0) {
                    if(strcmp($incomingState, $authState) !== 0){
                        var_dump($incomingState);
                        var_dump($authState);
                        die();
                    }
                    throw new HttpException(400, 'Invalid auth state parameter.');
                }
            }







devStatus для правки корзины
frontend/copmonents/widgets/dashboardcart/views/index.php





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
