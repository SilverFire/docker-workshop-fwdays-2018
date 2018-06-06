1. Start PHP-FPM
```bash
docker run --rm -d --name -v $PWD/app:/app php-fpm php:7.2-fpm
```

2. Ensure container is running:

```bash
docker ps
```

2. Create NGINX config:
```nginx
server {
    listen 80;
    server_name _;
    root /app;

    location / {
        include          fastcgi_params;
        fastcgi_pass     php-fpm:9000;
        fastcgi_param    SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

3. Run Nginx:
```bash
docker run --rm -it --name nginx -v $PWD/config/vhost.conf:/etc/nginx/conf.d/vhost.conf -v $PWD/app:/app -p 2080:80 nginx
```

and see error:

```
2018/06/03 08:48:36 [emerg] 1#1: host not found in upstream "php-fpm" in /etc/nginx/conf.d/vhost.conf:7
nginx: [emerg] host not found in upstream "php-fpm" in /etc/nginx/conf.d/vhost.conf:7
```

Learn about networking.

4. Add a link:

```bash
docker run --rm -d --name nginx -v $PWD/config/vhost.conf:/etc/nginx/conf.d/default.conf -v $PWD/app:/app -p 2080:80 --link php-fpm nginx
```

5. Navigate to http://localhost:2080/index.php
