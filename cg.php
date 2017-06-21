<?php
/**
 * 初始化脚手架
 */

//开始配置变量
if ($argc < 3) {
    die(<<<USAGE

*******************************************************************************************
Code Generator Version 3.0.0
*******************************************************************************************

使用说明:

1. 执行当前脚本需要root权限

2. 执行命令示例
   /usr/bin/php /data1/htdocs/phplib-template/cg.php 项目名称 域名      模块列表(多个模块用英文逗号分割)
   /usr/bin/php /data1/htdocs/phplib-template/cg.php demo    demo.com admin,wechat
   
3. 生成的项目代码目录位置 - /data1/htdocs/{项目名称}

*******************************************************************************************
\n
USAGE
    );
}
$app_name   = $argv[1];
$app_domain = $argv[2];
$app_path   = "/data1/htdocs/{$app_name}";

if (empty($argv[3])) {
    $modules = array();
} else {
    $modules = explode(',', $argv[3]);
}
define('TEMPLATE_DIR', dirname(__FILE__));
define('DEFAULT_MODULES', array('admin', 'wechat'));

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

//写入index模块文件
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

//cp docker nginx配置
file_put_contents("/etc/nginx/vhosts/" . $app_domain . ".conf",
    str_replace(array("@appname@", "@appdomain@"), array($app_name, $app_domain), file_get_contents(dirname(__FILE__) . "/build/nginx/vhosts/template.conf")));
$nginx_log_dir = "/data1/logs/nginx";
if (!file_exists($nginx_log_dir)) {
    exec("mkdir -p {$nginx_log_dir};chmod 0777 {$nginx_log_dir}");
}

exec("service nginx reload");
//执行命令 创建数据库
exec("mysql -h127.0.0.1 -u{$db_root_name} -p{$db_root_pwd} < {$app_path}/build/build.sql");
//创建日志文件夹  改变日志文件夹及静态资源文件夹的权限
exec("mkdir -p /data1/logs/{$app_name};chmod 0777 /data1/logs/{$app_name}");
//shell目录下的脚本加上执行权限
exec("chmod -R 0777 $app_path/bin/");

//处理模块
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

    //执行程序和sql
    exec("mysql -h127.0.0.1 -u{$db_root_name} -p{$db_root_pwd} {$app_name} < $app_path/build/{$module}.sql");
}

exec("rm -r $app_path/build/");
exec("rm $app_path/cg.php");

echo PHP_EOL . "项目生成完毕..." . PHP_EOL . PHP_EOL;

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