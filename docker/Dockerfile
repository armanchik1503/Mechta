# Используем официальный PHP образ
FROM php:8.1-apache

# Устанавливаем необходимые расширения
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Копируем файлы проекта в рабочую директорию контейнера
COPY . /var/www/html/

# Делаем .env файл доступным для приложения
RUN chmod 755 /var/www/html/.env
