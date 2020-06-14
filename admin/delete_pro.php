<?php

require_once '../database/db.php';


$id = $_GET['id'];
$requette = "DELETE FROM products WHERE pro_id = ?";
$statement = $db->prepare($requette);

if($statement->execute([$id])){
    header("location:products.php");
}

