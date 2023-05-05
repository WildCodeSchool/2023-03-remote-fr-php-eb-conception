#!/usr/bin/env sh
set -e
mkdir -p /var/www/public/uploads
chmod -R 777 /var/www/public/uploads

composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist \
    --quiet

php /var/www/migration.php


php-fpm -D
nginx -g 'daemon off;'
