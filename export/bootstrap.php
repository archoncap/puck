<?php
@ini_set('date.timezone', 'Asia/Shanghai');
@header('content-type:text/html;charset=utf-8');

define('EXPORT_PATH',__DIR__);
define('BASE_PATH', EXPORT_PATH.'/..');
define('DEBUG',1);
require BASE_PATH . '/vendor/autoload.php';

require EXPORT_PATH . '/config/config.php';

if(DEBUG){
    error_reporting(E_ALL);
    @ini_set('display_errors', 'On');
    @ob_start();
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

$db = new MysqliDb(require EXPORT_PATH.'/config/database.php');
// 路由配置、开始处理
require EXPORT_PATH.'/config/routes.php';