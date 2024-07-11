FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    libpq-dev

#enable mod_rewrite
RUN a2enmod rewrite

# install php extentions
RUN docker-php-ext-install zip pdo pdo_pgsql

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APP_DEBUG false

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /var/www/html

# RUN chown -R www-data:www-data /var/www/html/storage
# RUN chmod -R 775 /var/www/html/storage

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage/logs \
    && chmod -R 775 /var/www/html/storage/logs

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV APP_URL https://localhost

RUN composer install --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

#vite and npm related
RUN apt-get update
RUN apt-get install -y nodejs npm

RUN npm install
RUN npm run build

# RUN php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port $PORT
EXPOSE $PORT