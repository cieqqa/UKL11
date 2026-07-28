#!/bin/sh
set -e

# Ensure database directory and file exist
mkdir -p /var/www/html/database
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run migrations
php artisan migrate --force

# Cache configuration & routes
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Laravel built-in server on Render's PORT (defaults to 10000)
PORT=${PORT:-10000}
echo "Starting Laravel server on port $PORT..."
exec php artisan serve --host=0.0.0.0 --port=$PORT
