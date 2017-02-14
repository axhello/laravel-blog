FROM php:7.0.12-fpm

WORKDIR /working
# 安装 PHP 相关的依赖包，如需其他依赖包在此添加
RUN apt-get update --fix-missing && apt-get install -y \
    g++ autoconf bash git apt-utils libxml2-dev libcurl3-dev pkg-config \
    && ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo "Asia/Shanghai" > /etc/timezone \

    # 官方 PHP 镜像内置命令，安装 PHP 依赖
    && docker-php-ext-install \
        curl \
        mcrypt \
        mbstring \
        mysqli \
        pdo_mysql \
        zip \
    && docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-enable gd \
    && pecl install /pecl/redis-3.0.0.tgz \
    && docker-php-ext-enable redis \
    && apt-get purge -y --auto-remove \
    # 用完包管理器后安排打扫卫生可以显著的减少镜像大小
    && apt-get clean \
    && apt-get autoclean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && rm -rf /pecl

# 安装 composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update \
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
    && composer global require "laravel/installer=~1.1" \
    && composer global require predis/predis \
    && wget https://phar.phpunit.de/phpunit.phar \
    && chmod +x phpunit.phar \
    && mv phpunit.phar /usr/local/bin/phpunit