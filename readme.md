# laravel-blog

Blog project written in Laravel 5.2.

## Features

- [x] Version 5.2
- [x] Support SEO optimization
- [x] Friendship link manage
- [x] Support new page
- [x] Backend support for custom skin
- [x] Add [Syntax Highlighter](http://prismjs.com/#basic-usage)

## Packages

* [laravelcollective/html](https://github.com/LaravelCollective/html)
* [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable/)


## Installation

1、Clone to your server

```
git clone https://github.com/axhello/laravel-blog.git
```

2、In your project root directory `cd laravel-blog/`, use `composer` to install：

```
composer install
```

3、Change`.env.example`to`.env`file, setup your MySQL database, modify the following:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

4、Generate key

```
php artisan key:generate
```

5、 Modify the `storage directory` to write

```
chmod -R 755 storage/
```

6、 Migrate database

```
php artisan migrate
```
7、Seed some data（Default user）

```
php artisan db:seed
```
Default backend login ：`http://yourhost/admin` 

username：`admin@admin.com` password：`admin123`

8、 Use Apache to open the `mod_rewrite`, Use the nginx please configure your `host file`, refer to the following：

```
server {
    listen 80;
    #listen 443 ssl;
    charset utf-8;
    server_name localhost;
    root /home/laravel-blog/public;

    index index.php index.html index.htm;
    
    #ssl_certificate     /etc/nginx/ssl/laravel.dev.crt;
    #ssl_certificate_key /etc/nginx/ssl/laravel.dev.key;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        #fastcgi_pass 127.0.0.1:9000;
        fastcgi_pass  unix:/tmp/php-cgi.sock;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #include fastcgi_params;
        include fastcgi.conf;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

## License

laravel-blog is licensed under [The MIT License](https://github.com/axhello/laravel-blog/blob/master/LICENSE).
