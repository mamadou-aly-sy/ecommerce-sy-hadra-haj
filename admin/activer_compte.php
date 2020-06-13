<?php

require_once '../database/db.php';

$id = $_GET['id'];
$etat = $_GET['etat'];

if($etat == 1)  
    $newEtat = 0 ;
else 
    $newEtat = 1;

$requette = "UPDATE users SET etat = ? WHERE id = ?";
$params = [$newEtat,$id];

$resultat = $db->prepare($requette);
if($resultat->execute($params)){
    header('location:users.php');
}