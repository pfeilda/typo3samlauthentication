FROM typo3-docker

COPY composer-dev.json /var/www/html/composer.json
RUN composer install
RUN touch /var/www/html/public/FIRST_INSTALL
RUN chown -R www-data.www-data /var/www/html

RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/conf.d/php.ini
RUN touch $PHP_INI_DIR/conf.d/typo3.ini
RUN echo "memory_limit = 2G" >> $PHP_INI_DIR/conf.d/typo3.ini
RUN echo "max_execution_time=240" >> $PHP_INI_DIR/conf.d/typo3.ini
RUN echo "max_input_vars=1500" >> $PHP_INI_DIR/conf.d/typo3.ini

RUN echo "SetEnv HTTP_HOST localhost" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_sn Mustermann" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_firstname Max" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_displayName 'Max Mustermann'" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_HTTP_UID musterma" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_Shib-Identity-Provider 'https://idp.dev/idp/shibboleth'" >> /etc/apache2/apache2.conf
RUN echo "SetEnv TYPO3_CONTEXT Development" >> /etc/apache2/apache2.conf