<?php

require_once 'vendor/autoload.php';

use Handlers\SearchHandler;
use src\Database;
use src\Logger;
use src\Renderer;

$host     = getenv('MYSQL_HOST');
$dbname   = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

// Инициализация объектов
$db     = new Database($host, $dbname, $username, $password);
$logger = new Logger('/var/www/search_log.txt');

$renderer = new Renderer();

$searchHandler = new SearchHandler($db, $logger, $renderer);

$request = $_REQUEST;
$searchHandler->handleRequest($request);