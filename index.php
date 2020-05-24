<?php
require_once "database/db.php";

ob_start();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "acceuil";
}
if (file_exists("pages/$page.php")) {
    require "pages/$page.php";
} else {
    require "pages/404.php";;
}

$content = ob_get_clean();

require "pages/default.php";