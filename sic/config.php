<?php

require_once "vendor/autoload.php";

$rootDir = __DIR__;
if (file_exists("$rootDir/.env")) {
    $dotenv = Dotenv\Dotenv::createImmutable($rootDir);
    $dotenv->load();
}

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$entidades = array("Model/");
$isDevMode = filter_var($_ENV['APP_DEBUG'] ?? true, FILTER_VALIDATE_BOOLEAN);

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => $_ENV['DB_HOST'] ?? 'localhost',
    'port'     => $_ENV['DB_PORT'] ?? '3306',
    'user'     => $_ENV['DB_USERNAME'] ?? 'user_banco',
    'password' => $_ENV['DB_PASSWORD'] ?? '',
    'dbname'   => $_ENV['DB_DATABASE'] ?? 'sic',
);

$config = Setup::createAnnotationMetadataConfiguration($entidades, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
