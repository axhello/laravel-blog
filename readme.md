# laravel-blog
基于laravel5.2开发的博客

### Usage

1、克隆或者下载上次到你的服务器

```
git clone https://github.com/axhello/laravel-blog.git
```

2、进入到根目录`cd laravel-blog/`，用composer更新项目：

```
composer install
```

3、 修改`.env.example`为`.env`文件,配置你的mysql数据库,修改以下:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

4、 修改目录为可写,在根目录下执行

```
chmod -R 755 storage/
```

5、 安装数据库

```
php artisan migrate
```
6、填充数据库（默认用户）

```
php artisan db:seed
```
默认后台登录地址是：`http://yourhost/admin` 

登录账户是：`admin@admin.com` 密码：`admin23`

7、 使用apache请开启mod_rewrite， 使用nginx请配置你的虚拟主机文件，参考：

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
