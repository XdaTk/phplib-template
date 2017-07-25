# Set the base image to centos6.8
FROM ifintech/php

# File Author / Maintainer
MAINTAINER lvyalin lvyalin.yl@gmail.com

## copy项目代码
COPY . /data1/htdocs/@appname@/

## 去掉无用的文件
RUN rm -rf /data1/htdocs/@appname@/.git