<?php

include __DIR__ . '/src/Framework/Database.php';
require __DIR__ . "/../../vendor/autoload.php";


use Framework\Database;
use App\Config\Paths;
use Dotenv\Dotenv;


$dotenv= Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$db = new Database($_ENV['DB_DRIVER'], [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_NAME']
], $_ENV['DB_USER'], $_ENV['DB_PASS']);

// try {
//     $db->connection->beginTransaction();

//     $db->connection->query("INSERT INTO products VALUES(99, 'Gloves')");

//     $search = 'Hats';
//     $query = "SELECT * FROM products WHERE name=:name";

//     $stmt = $db->connection->prepare($query);

//     $stmt->bindValue('name', $search, PDO::PARAM_STR);
//     $stmt->execute();

//     var_dump($stmt->fetchAll());
//     $db -> connection -> commit();
// } catch (Exception $error) {
//     if ($db -> connection ->inTransaction()){
//         $db -> connection -> rollBack();
//     }

//     echo "Transaction failed!";
// }

$sqlFile = file_get_contents("./database.sql");

$db->query($sqlFile);
