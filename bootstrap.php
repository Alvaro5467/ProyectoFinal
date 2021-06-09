<?php require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
/** * Genera el gestor de entidades *
 *  * @return Doctrine\ORM\EntityManager */ 
function getEntityManager()
{
    $dbParams = array('host' => $_ENV['DB_HOST'], 'port' => $_ENV['DB_PORT'], 'dbname' => $_ENV['DB_NAME'], 'user' => $_ENV['DB_USER'], 'password' => $_ENV['DB_PASSWD'], 'driver' => $_ENV['DB_DRIVER'], 'charset' => $_ENV['DB_CHARSET']);
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . $_ENV['ENTITY_DIR']), 0, '/home/alvaro/proyectos/tmp', null, false);
    $config->setAutoGenerateProxyClasses(true);
    if (0) {
        $config->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
    }
    return EntityManager::create($dbParams, $config);
}
