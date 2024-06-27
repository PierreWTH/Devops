#!/bin/bash
set -e

# Navigate to the project directory
cd /var/www/project

# Install composer dependencies
composer install --prefer-dist --no-progress

# Run PHPStan
phpstan analyse /app/project/src --level=4

# Check if the database exists, and if not, create it and run migrations
    php bin/console doctrine:migrations:migrate --no-interaction
    php bin/console doctrine:fixtures:load --no-interaction
# fi

# Execute the passed command
exec "$@"
