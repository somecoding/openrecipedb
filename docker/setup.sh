#!/usr/bin/env bash

php-fpm -c /usr/local/etc/php/php.ini &

cd /www/app
chmod -R 777 data/
rm -rf data/cache/*
rm -rf data/DoctrineORMModule/*


LOGFILE=data/log/application.log

if [ -f "$LOGFILE" ]; then
  echo "$LOGFILE exists."
  rm $LOGFILE
  touch $LOGFILE
else
  echo "$LOGFILE does not exist."
  touch $LOGFILE
fi

chmod 0777 $LOGFILE


#Start Warmup
composer install --ignore-platform-reqs --prefer-source --no-plugins --no-scripts --optimize-autoloader
php public/index.php orm:generate-proxies
php public/index.php reinfi:di cache warmup
php public/index.php orm:schema-tool:update -f
chown www-data:www-data -R /www/app
echo "Setup finished"
tail -f $LOGFILE # This line is important: A running process is needed for the container to stay up!
