1. Create `.env` file near to `docker-compose.yml` with the follwing lines:

```
MYSQL_USER=demo
MYSQL_PASSWORD=demo
```

2. Use env variables in `docker-compose.yml`:

```yml
    mysql:
        image: mysql:5.7
        environment:
            - MYSQL_DATABASE=test
            - "MYSQL_USER=${MYSQL_USER}"
            - "MYSQL_PASSWORD=${MYSQL_PASSWORD}"
            - MYSQL_RANDOM_ROOT_PASSWORD=1
```


