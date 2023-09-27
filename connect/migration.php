<?php

//define db constant
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");

//create connection db
$connect = new mysqli(DB_HOST, DB_USER, DB_PASS);
if(!$connect) {
    die("Connection failed: " . mysqli_connect_error($connect));
}else {
    echo "Connection successfully";
}

//CREATE DB
try {
    $createDB = "CREATE DATABASE IF NOT EXISTS maverick_dresses";
    $result = $connect->query($createDB);

    if(!$result) {
        echo "Error creating database: " . mysqli_connect_error($connect);
    }else {
        echo "Database created successfully";
    }

}catch(Exception $e) {
    echo $e->getMessage();
}


?>
