FROM martinhelmich/typo3:10

RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/conf.d/

RUN echo "memory_limit = 2G" >> $PHP_INI_DIR/conf.d/typo3.ini
RUN echo "SetEnv HTTP_HOST localhost" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_sn Mustermann" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_firstname Max" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_displayName 'Max Mustermann'" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_HTTP_UID musterma" >> /etc/apache2/apache2.conf
RUN echo "SetEnv AJP_Shib-Identity-Provider 'https://idp.dev/idp/shibboleth'" >> /etc/apache2/apache2.conf