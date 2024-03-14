<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhosti',
    'port' => 3306,
    'dbname' => 'phpiggy'
], 'root', '');

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
