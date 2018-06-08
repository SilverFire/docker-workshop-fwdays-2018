1. Write custom entrypoint:

```bash
#!/usr/bin/env bash

XDEBUG_CONFIG_FILE=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

if [ "$ENV" = "dev" ]; then
    if [ -n "$XDEBUG_REMOTE_HOST" ]; then
        echo "[ xdebug ] Set remote host to $XDEBUG_REMOTE_HOST"
        sed -i "s/xdebug.remote_host\s*=\s*.*/xdebug.remote_host=$XDEBUG_REMOTE_HOST/" "$XDEBUG_CONFIG_FILE"
    fi
    if [ -n "$XDEBUG_REMOTE_PORT" ]; then
        echo "[ xdebug ] Set remote port to $XDEBUG_REMOTE_PORT"
        sed -i "s/xdebug.remote_port\s*=\s*.*/xdebug.remote_port=$XDEBUG_REMOTE_PORT/" "$XDEBUG_CONFIG_FILE"
    fi
else
    echo "[ xdebug ] Disabled"
    sed -i "1s/^/;/" "$XDEBUG_CONFIG_FILE"
fi

if [ "${1#-}" != "$1" ]; then
    set -- php-fpm "$@"
fi

exec "$@"
```

2. Enable it in Dockerfile

```Dockerfile
COPY xdebug-aware-entrypoint /usr/local/bin
ENTRYPOINT ["xdebug-aware-entrypoint"]
CMD ["php-fpm"]
```

3. Build image: `docker build -t softyfire/php:7.2-fpm .`

4. Ensure XDebug is disabled when env is not dev:

```bash
docker run --rm -it softyfire/php:7.2-fpm php -i | grep xdebug
```

5. Ensure XDebug gets enabled and properly configured with the required envronment variables:

```bash
docker run --rm -it --env ENV=dev --env XDEBUG_REMOTE_HOST=192.168.1.10 softyfire/php:7.2-fpm php -i | grep xdebug | grep -E "host|port|enabled"
```
