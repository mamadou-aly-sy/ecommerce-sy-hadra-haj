<?php

function dump($element="")
{       
    echo "<pre>";
    print_r($element);
    echo "</pre>";
    die();
}

function getExtention(string $fileName)
{
    $tab = explode(".", $fileName);
    count($tab);
    return $tab[count($tab) - 1];
}