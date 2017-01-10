<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//defined('WEBROOT') or define('WEBROOT','C:/wamp/www/yii2_basic_backend_svn');
defined('WEBROOT') or define('WEBROOT','/home/wwwroot/images/backend');
defined('IMGURL') or define('IMGURL','http://img.huizhish.com');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
