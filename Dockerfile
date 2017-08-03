# Set the base image to centos6.8
FROM ifintech/php

# File Author / Maintainer
MAINTAINER lvyalin lvyalin.yl@gmail.com

## 设置env
ENV APP_NAME = @appname@

## copy项目代码
COPY . /data1/htdocs/@appname@/