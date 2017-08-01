<?php
/**
 * 初始化脚手架
 */

//开始配置变量
if ($argc < 4) {
    die(<<<USAGE

*******************************************************************************************
Code Generator Version 3.0.0
*******************************************************************************************

使用说明:
    执行命令示例:
   /usr/local/php/bin/php /data1/htdocs/phplib-template/cg.php 项目名称 域名      项目目标地址  模块列表(多个模块用英文逗号分割)
   /usr/local/php/bin/php /data1/htdocs/phplib-template/cg.php demo    demo.com  /home/demo  Admin,wechat

*******************************************************************************************
\n
USAGE
    );
}
$app_name   = $argv[1];
$app_domain = $argv[2];
$app_path   = $argv[3];

if (empty($argv[4])) {
    $modules = array();
} else {
    $modules = explode(',', $argv[4]);
}
define('TEMPLATE_DIR', dirname(__FILE__));
const DEFAULT_MODULES = array(
    'admin', 'wechat'
);

if (file_exists($app_path)) {
    rename($app_path, $app_path . "." . date('YmdHis', time()));
}
$db_root_name = 'root';
$db_root_pwd  = 'Root1.pwd';  // MySQL5.7对于密码要求: 至少8个字符, 至少包括一个大写拉丁字符、一个小写拉丁字符、数字和特殊字符

//需要替换的值
$replace = array(
    "@appname@"      => $app_name,
    "@appdomain@"    => $app_domain,
    "@db_root_name@" => $db_root_name,
    "@db_root_pwd@"  => $db_root_pwd,
);

//区分index和其他子模块模版
$files = getFilesInDir(TEMPLATE_DIR);
$index_files = array();
$module_files = array();
foreach ($files as $file) {
    foreach (DEFAULT_MODULES as $module) {
        if (false !== strpos(strtolower($file), $module)) {
            $module_files[$module][] = $file;
            continue 2;
        }
    }
    $index_files[] = $file;
}

//构建的时候不默认添加老的长进程master-worker模式入口文件
$index_files = array_filter($index_files, function ($file) {
    if (false !== strpos(strtolower($file), 'daemon')) {
        return false;
    }

    return true;
});

// 写入index模块文件
foreach ($index_files as $file) {
    $app_file = str_replace(TEMPLATE_DIR, $app_path, $file);
    if (!file_exists(dirname($app_file))) {
        mkdir(dirname($app_file), 0777, true);
    }
    $content = file_get_contents($file);
    foreach ($replace as $key => $value) {
        $content = str_replace($key, $value, $content);
    }
    file_put_contents($app_file, $content);
}

// 处理模块
foreach ($modules as $module) {
    foreach ($module_files[$module] as $file) {
        $app_file = str_replace(TEMPLATE_DIR, $app_path, $file);
        if (!file_exists(dirname($app_file))) {
            mkdir(dirname($app_file), 0777, true);
        }
        $content = file_get_contents($file);
        foreach ($replace as $key => $value) {
            $content = str_replace($key, $value, $content);
        }
        file_put_contents($app_file, $content);
    }
}

// 处理nginx配置文件名称
exec("mv $app_path/build/nginx/vhosts/template.conf /usr/local/openresty/nginx/conf/vhosts/$app_name.conf");

echo PHP_EOL . "项目生成完毕..." . PHP_EOL . PHP_EOL;
echo PHP_EOL . "项目地址为$app_path" . PHP_EOL . PHP_EOL;

/**
 * 获取所有的代码模板文件
 *
 * @param string $dir
 *
 * @return array
 */
function getFilesInDir($dir) {
    $exclude_files = array(
        '.',
        '..',
        '.git',
        'README.md',
        'cg.php'
    );

    $file_list = array();
    $files    = scandir($dir);
    foreach ($files as $file) {
        if (in_array($file, $exclude_files)) {
            continue;
        }
        if (is_dir($dir . '/' . $file)) {
            $file_list = array_merge(getFilesInDir($dir . '/' . $file), $file_list);
            continue;
        }
        if (is_file($dir . '/' . $file)) {
            $file_list[] = $dir . "/" . $file;
            continue;
        }
    }

    return $file_list;
}