1. Visit [PHP@Docker hub](https://hub.docker.com/_/php/) and learn about PHP-specific build things

2. Compose a Dockerfile as follows:

```Dockerfile
FROM php:7.2-fpm

RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo pdo_mysql
```

3. Run `docker build -t softyfire/php:7.2-fpm .`

4. Ensure image has Xdebug and PDO MySQL:

```bash
docker run --rm -it softyfire/php:7.2-fpm php -m | grep -E "pdo|xdeb"
```
