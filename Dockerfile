FROM php:8.3.10

RUN apt-get update -y && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    default-mysql-client default-libmysqlclient-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN if [ ! -f .env ]; then cp .env.example .env; fi

RUN php artisan key:generate

EXPOSE 8000

RUN ["php", "artisan", "migrate", "--seed"]

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
