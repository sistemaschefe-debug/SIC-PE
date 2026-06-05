<?php

require_once __DIR__ . '/../vendor/autoload.php';

$rootDir = dirname(__DIR__);
if (file_exists("$rootDir/.env")) {
    $dotenv = Dotenv\Dotenv::createImmutable($rootDir);
    $dotenv->load();
}

try {
    $opcoes = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    );

    $host = $_ENV['DB_HOST'] ?? 'localhost';
    $port = $_ENV['DB_PORT'] ?? '3306';
    $dbname = $_ENV['DB_DATABASE'] ?? 'sic';
    $user = $_ENV['DB_USERNAME'] ?? 'root';
    $pass = $_ENV['DB_PASSWORD'] ?? '';

    $conectar = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;",
        $user,
        $pass,
        $opcoes
    );
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<b>Ocorreu o seguinte erro: </b>" . $e->getMessage();
    die;
}
