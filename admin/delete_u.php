<?php

require_once '../database/db.php';


$id = $_GET['id'];
$requette = "DELETE FROM users WHERE id = ?";
$statement = $db->prepare($requette);
if($statement->execute([$id])){
    header("location:users.php");
}

