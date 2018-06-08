1. Add the following lines to `.env` file:

```env
ENV=dev
XDEBUG_REMOTE_HOST=192.168.1.10
XDEBUG_REMOTE_PORT=9001
```

2. Update php-fpm service in `docker-compose.yml`. Add the following section

```yaml
        environment:
            - "ENV=${ENV}"
            - "XDEBUG_REMOTE_HOST=${XDEBUG_REMOTE_HOST}"
            - "XDEBUG_REMOTE_PORT=${XDEBUG_REMOTE_PORT}"
```

3. Make sure it works as expected
