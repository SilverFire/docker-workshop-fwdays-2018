1. Create `docker-compose.yml` as follows:

```yaml
version: "3"

services:

    php-fpm:
        image: php:7.2-fpm
        volumes:
            - ${PWD}/app:/app

    nginx:
        image: nginx:latest
        links:
            - php-fpm
        ports:
            - 2080:80
        volumes:
            - ${PWD}/app:/app
            -
```

2. Run it with `docker-compose up`, ensure site is working
