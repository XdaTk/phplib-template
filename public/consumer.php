<?php
/**
 * consumer应用服务入口
 *
 * 流程:
 * 1. 声明项目关键目录绝对路径的宏定义
 * 2. 加载应用配置, 内容参考: http://yaf.laruence.com/manual/yaf.config.html
 * 3. 使用bootstrap引导服务进行启动项的加载, 参考: http://yaf.laruence.com/manual/yaf.bootstrap.html
 */
header('Pragma: no-cache', false);
require dirname(__DIR__) . '/conf/Init.php';

$path_info = $_SERVER['PATH_INFO'];
$path_arr = explode('/', trim($path_info, '/'));
$module = array_shift($path_arr);
if ('consumer' == strtolower($module)) {
    $module = 'Index';
}

$action = array_pop($path_arr);
$controller = implode('_', array_map(function ($item) {
    return ucfirst($item);
}, $path_arr));
if ('Index' == $module) {
    $controller = 'Consumer_' . $controller;
}
$params = json_decode($_REQUEST['data'], true);

$app  = new \Yaf\Application(APP_CONF. '/' . ('Index' == $module ? 'application' : strtolower($module)) . '.ini');
$app->bootstrap();

//设置执行的控制器及参数
$request = new \Yaf\Request\Simple("FASTCGI", $module, $controller, $action, $params);
$app->getDispatcher()->catchException(false);
$app->getDispatcher()->dispatch($request);