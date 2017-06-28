# phplib-template

## 思路

phplib-template定义了一个项目的标准目录结构，同时提供了代码脚手架功能，可以用来快速构建项目。

目的

* 约束规范
* 通过分层的方式达到分工明确的目的
* 配合phplib封装屏蔽复杂逻辑，最大化地简化业务编码工作

## 使用

/usr/bin/php /data1/htdocs/phplib-template/cg.php 项目名称 域名  模块列表(多个模块用英文逗号分割)

示范
```shell
/usr/local/php/bin/php /data1/htdocs/phplib-template/cg.php demo  demo.com Admin,wechat
```
说明

1. 执行cg脚本需要root权限   
2. 生成的项目代码目录位置 - /data1/htdocs/{项目名称}