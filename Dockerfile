FROM php:8.3-apache

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    git \
    zsh \
    libzip-dev \
    zip \
    && docker-php-ext-install mysqli pdo pdo_mysql pcntl zip sockets

# Включение модулей Apache
RUN a2enmod rewrite

# Установка oh-my-zsh
RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Копирование файлов в контейнер
COPY . /var/www/html


# Открытие портов
EXPOSE 80

# Команда для запуска Apache
CMD ["apache2-foreground"]