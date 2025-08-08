# --- Build composer dependencies ---
FROM composer:2 AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
COPY . .
RUN composer dump-autoload --optimize
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

# copy CA Aiven agar pdo_mysql bisa SSL verify
COPY certs/aiven-ca.pem /etc/ssl/certs/aiven-ca.pem
RUN chown laravel:laravel /etc/ssl/certs/aiven-ca.pem

# --- PHP-FPM + Nginx (alpine) ---
FROM php:8.2-fpm-alpine AS app
# ext yang umum dipakai Laravel + MySQL
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html
COPY --from=composer /app ./

# permissions storage/bootstrap
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel \
 && chown -R laravel:laravel storage bootstrap/cache
USER laravel

# --- Nginx sidecar via Caddy (lebih simpel) ---
FROM caddy:2-alpine
# copy app ke /var/www/html (read-only di caddy)
COPY --from=app /var/www/html /var/www/html
# Caddyfile sederhana
COPY <<'CADDYFILE' /etc/caddy/Caddyfile
:8080
root * /var/www/html/public
php_fastcgi php-fpm:9000
encode zstd gzip
file_server
CADDYFILE

# php-fpm container sebagai sidecar (Render akan jalankan Docker Compose gaya multi-serve lewat render.yaml)
