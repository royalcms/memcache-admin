FROM ecjia/php:7.4-apache

ENV MEMADMIN_VERSION 3.0

COPY www /var/www/html

RUN set -ex; \
	chown -R www-data:www-data /var/www/html

COPY docker-entrypoint.sh /usr/local/bin/

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]