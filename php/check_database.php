<?php
// Load the database configuration from .env or parameters
require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../project/.env');

if (file_exists(__DIR__ . '/../project/.env.local')) {
    $dotenv->load(__DIR__ . '/../project/.env.local');
}

$connectionParams = [
    'dbname' => getenv('DATABASE_NAME'),
    'user' => getenv('DATABASE_USER'),
    'password' => getenv('DATABASE_PASSWORD'),
    'host' => getenv('DATABASE_HOST'),
    'driver' => 'pdo_mysql',
];

try {
    $conn = DriverManager::getConnection($connectionParams);
    $conn->connect();
    echo "Database exists.";
    exit(0);
} catch (\Doctrine\DBAL\Exception $e) {
    echo "Database does not exist.";
    exit(1);
}
?>
