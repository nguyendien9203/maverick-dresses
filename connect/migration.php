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
    try {
        $createDB = "CREATE DATABASE IF NOT EXISTS maverick_dresses";
        $result = $connect->query($createDB);
    
        if(!$result) {
            echo "Error creating database " . $connect->error;
        }else {
            $connect->select_db("maverick_dresses");
    
            $roles = "CREATE TABLE IF NOT EXISTS roles(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                role_name VARCHAR(100) NOT NULL
            )";
        
            $resultRoles = $connect->query($roles);
            if(!$resultRoles) {
                echo "Error creating table Roles" . $connect->error;
            }
    
            $insertValueRoles = "INSERT INTO roles (role_name) VALUES ('admin'), ('user')";
            $resultValueRoles = $connect->query($insertValueRoles);
            if(!$resultValueRoles) {
                echo "Error inserting" . $connect->error;
            }
        
            $users = "CREATE TABLE IF NOT EXISTS users(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                role_id INT NOT NULL DEFAULT 2,
                full_name VARCHAR(100) NOT NULL,
                email VARCHAR(150) NOT NULL UNIQUE,
                phone_number VARCHAR(20) NOT NULL UNIQUE,
                address VARCHAR(500) NOT NULL,
                password VARCHAR(100) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT FK_users_roles FOREIGN KEY (role_id) REFERENCES roles (id)
            )";
        
            $resultUsers = $connect->query($users);
            if(!$result) {
                echo "Error creating table Users" . $connect->error;
            }  
        }
    }catch(Exception $e) {
        echo $e->getMessage();
    }
}

//CREATE DB



?>
