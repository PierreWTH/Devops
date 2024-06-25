#!/bin/bash
set -e

# Navigate to the project directory
cd /var/www/project

# Install composer dependencies
composer install

# Check if the database exists, and if not, create it and run migrations
if ! php bin/console doctrine:database:exists --if-not-exists; then
    php bin/console doctrine:database:create
    # php bin/console make:migrations
    php bin/console doctrine:migrations:migrate
    php bin/console doctrine:fixtures:load --no-interaction
fi

# Execute the passed command
exec "$@"
