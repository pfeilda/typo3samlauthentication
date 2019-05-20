FROM webdevops/php-apache-dev:7.2

ENV PHP_DISPLAY_ERRORS 1
#ENV WEB_DOCUMENT_ROOT /app/public

WORKDIR .

COPY ./composer.json /app
COPY ./vhost /opt/docker/etc/httpd/vhost.common.d
#COPY typo3conf/LocalConfiguration.php /app/public/typo3conf/LocalConfiguration.php
#COPY typo3conf/PackageStates.php /app/public/typo3conf/PackageStates.php

RUN cd /app && composer u
RUN chown -R application.application /app/*
RUN touch /app/public/FIRST_INSTALL