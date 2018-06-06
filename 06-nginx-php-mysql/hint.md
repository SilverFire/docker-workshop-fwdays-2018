1. Visit [MySQL@Docker hub](https://hub.docker.com/_/mysqk/) and learn about things specific for this image

2. Add service to the docker-compose file:

```yaml
    mysql:
        image: mysql:5.7
        environment:
            - MYSQL_DATABASE=test
            - MYSQL_USER=demo
            - MYSQL_PASSWORD=demo
            - MYSQL_RANDOM_ROOT_PASSWORD=1
```

3. Run `docker-compose up`

4. Ensure connection can be established
