<?php

try {
    $db = new PDO("mysql:dbname=ecommerce;host=127.0.0.1", "root", "");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}