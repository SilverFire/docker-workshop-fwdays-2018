1. Add to Dockerfile the following lines:

```Dockerfile
RUN { \
    echo "xdebug.profiler_enable=0"; \
    echo "xdebug.remote_autostart=0"; \
    echo "xdebug.remote_enable=1"; \
    echo "xdebug.max_nesting_level=500"; \
    echo "xdebug.remote_host=192.168.1.10"; \
    echo "xdebug.remote_port=9000"; \
} | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
```

3. Run `docker build -t softyfire/php:7.2-fpm .`

4. Ensure config is applied

```bash
docker run --rm -it softyfire/php:7.2-fpm cat /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
```
