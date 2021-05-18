FROM typo3-docker

COPY composer-dev.json /var/www/html/composer.json
RUN composer install
RUN ln -s ../vendor/simplesamlphp/simplesamlphp/www public/simplesaml
RUN touch /var/www/html/public/FIRST_INSTALL
RUN chown -R www-data.www-data /var/www/html

RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/conf.d/php.ini
RUN echo "memory_limit = 2G" >> $PHP_INI_DIR/conf.d/typo3.ini
RUN echo "max_execution_time=240" >> $PHP_INI_DIR/conf.d/typo3.ini
RUN echo "max_input_vars=1500" >> $PHP_INI_DIR/conf.d/typo3.ini

RUN mkdir -p /var/www/html/simplesamlconfig/cert
RUN openssl req -batch -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem
RUN openssl req -batch -newkey rsa:3072 -new -x509 -days 3652 -nodes -out /var/www/html/simplesamlconfig/cert/saml.crt -keyout /var/www/html/simplesamlconfig/cert/saml.pem

RUN a2ensite default-ssl.conf
RUN echo "SetEnv SIMPLESAMLPHP_CONFIG_DIR /var/www/html/simplesamlconfig" >> /etc/apache2/apache2.conf
RUN echo "SetEnv HTTP_HOST localhost" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_sn Mustermann" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_firstname Max" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_displayName 'Max Mustermann'" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_HTTP_UID musterma" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_Shib-Identity-Provider 'https://idp.dev/idp/shibboleth'" >> /etc/apache2/apache2.conf
RUN echo "SetEnv TYPO3_CONTEXT Development" >> /etc/apache2/apache2.conf