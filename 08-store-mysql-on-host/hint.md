1. Visit [MySQL@Docker hub](https://hub.docker.com/_/mysql) to see for suggestions.

2. Add `volumes` section to MySQL service in `docker-compose.yml`:

```yml
    mysql:
        volumes:
            - ${PWD}/data/mysql:/var/lib/mysql
```

3. Recreate container
