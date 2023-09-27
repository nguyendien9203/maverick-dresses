<?php
    require_once("utils.php");

    // define database constant

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME","maverick_dresses");

    define("BASE_URL", "http://localhost/project/eProject/Maverick_Dresses");

    
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    
?>