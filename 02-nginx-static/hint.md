1. Run
```bash
docker run --rm -it -p 2080:80 nginx
```

2. Ensure port is available.

3. See logs to find out the HTML docroot

4. Restart container with mounted `app` dir
```bash
docker run --rm -it -p 2080:80 -v $PWD/app:/usr/share/nginx/html nginx
```
