<?php
require_once "database/db.php";

ob_start();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "acceuil";
}

if ($page == "contact") {
    require "pages/contact.php";
} else {
    require "pages/acceuil.php";
}

$content = ob_get_clean();

require "pages/default.php";