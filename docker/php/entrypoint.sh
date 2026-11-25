#!/bin/sh
set -e

cd /var/www/html

# Pastikan direktori storage dan bootstrap/cache tersedia serta writable
mkdir -p \
    storage/app/public \
    storage/app/private \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Buat .env dari .env.example jika belum ada dan sesuaikan konfigurasi Docker MySQL
if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
    php -r '
        $env = file_get_contents(".env");
        $replacements = [
            "/^APP_URL=.*/m" => "APP_URL=" . (getenv("APP_URL") ?: "http://localhost:8000"),
            "/^DB_CONNECTION=.*/m" => "DB_CONNECTION=" . (getenv("DB_CONNECTION") ?: "mysql"),
            "/^#?\s*DB_HOST=.*/m" => "DB_HOST=" . (getenv("DB_HOST") ?: "mysql"),
            "/^#?\s*DB_PORT=.*/m" => "DB_PORT=" . (getenv("DB_PORT") ?: "3306"),
            "/^#?\s*DB_DATABASE=.*/m" => "DB_DATABASE=" . (getenv("DB_DATABASE") ?: "cibeuremtalaga"),
            "/^#?\s*DB_USERNAME=.*/m" => "DB_USERNAME=" . (getenv("DB_USERNAME") ?: "laravel"),
            "/^#?\s*DB_PASSWORD=.*/m" => "DB_PASSWORD=" . (getenv("DB_PASSWORD") ?: "secret"),
        ];
        foreach ($replacements as $pattern => $value) {
            $env = preg_replace_callback($pattern, fn () => $value, $env);
        }
        file_put_contents(".env", $env);
    '
fi

# Generate APP_KEY, symlink storage, dan jalankan migrasi jika vendor sudah tersedia
if [ -f .env ] && [ -f vendor/autoload.php ]; then
    if grep -qE "^APP_KEY=[[:space:]]*$" .env; then
        php artisan key:generate --force --no-interaction
    fi

    if [ ! -e public/storage ]; then
        php artisan storage:link --no-interaction || true
    fi

    php artisan migrate --force --no-interaction || echo "[entrypoint] Warning: migration skipped or failed."
fi

exec "$@"

