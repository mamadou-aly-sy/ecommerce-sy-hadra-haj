<?php

try {
    $db = new PDO("mysql:dbname=ecommerce;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Error lors de la connexion à la base : ' . $e->getMessage();
}
