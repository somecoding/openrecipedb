install: dev
	docker-compose exec php-fpm bash -c 'cd /www/app && XDEBUG_MODE=off composer install --ignore-platform-reqs --prefer-source --no-plugins --no-scripts --optimize-autoloader'
update: dev
	docker-compose exec php-fpm bash -c 'cd /www/app && XDEBUG_MODE=off composer update --ignore-platform-reqs --prefer-source --no-plugins --no-scripts --optimize-autoloader'
dev:
	docker-compose exec php-fpm bash -c 'cd /www/app && XDEBUG_MODE=off composer development-enable'