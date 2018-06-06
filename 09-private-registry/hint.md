1. Read the [Deploy a registry server](https://docs.docker.com/registry/deploying/) article to see for suggestions.

2. Create `docker-compose.yml`:

```yml
version: "3"

services:
    registry:
      image: registry:2
      ports:
        - 2099:5000
      volumes:
        - "${PWD}/data:/var/lib/registry"
```

3. Run service and try pushing image to it:

```bash
docker tag softyfire/php:7.2-fpm localhost:2099/softyfire/php:7.2-fpm
docker push localhost:2099/softyfire/php:7.2-fpm
```
