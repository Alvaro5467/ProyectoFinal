<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->Load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_PASSWD', 'DB_DRIVER']);
require_once __DIR__ . '/bootstrap.php';
$entityManager = getEntityManager();
return ConsoleRunner::createHelperSet($entityManager);
