<?php

try {
    $db = new PDO("mysql:dbname=ecommerce;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
