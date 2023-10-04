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
                echo "Error creating table roles" . $connect->error;
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
            if(!$resultUsers) {
                echo "Error creating table users" . $connect->error;
            }
            

            $category = "CREATE TABLE IF NOT EXISTS category(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                category_name VARCHAR(100) NOT NULL
            )";

            $resultCategory = $connect->query($category);
            if(!$resultCategory) {
                echo "Error creating table category" . $connect->error;
            }

            $orders = "CREATE TABLE IF NOT EXISTS orders(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                user_id INT NOT NULL,
                order_date DATETIME NOT NULL,
                status VARCHAR(20) NOT NULL,
                total_money FLOAT NOT NULL,
                CONSTRAINT FK_orders_users FOREIGN KEY (user_id) REFERENCES users (id)
            )";

            $resultOrders = $connect->query($orders);
            if(!$resultOrders) {
                echo "Error creating table orders" . $connect->error;
            }

            $order_details = "CREATE TABLE IF NOT EXISTS order_details(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                order_id INT NOT NULL,
                quantity INT NOT NULL,
                sell_price FLOAT NOT NULL,
                CONSTRAINT FK_orderDetails_orders FOREIGN KEY (order_id) REFERENCES orders (id)
            )";

            $resultOrderDetails = $connect->query($order_details);
            if(!$resultOrderDetails) {
                echo "Error creating table order_details" . $connect->error;
            }

            $products = "CREATE TABLE IF NOT EXISTS products(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                category_id INT NOT NULL,
                order_id INT NOT NULL,
                product_name VARCHAR(350) NOT NULL,
                product_price FLOAT NOT NULL,
                product_img VARCHAR(500) NOT NULL,
                product_desc TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT FK_products_category FOREIGN KEY (category_id) REFERENCES category (id),
                CONSTRAINT FK_products_orders FOREIGN KEY (order_id) REFERENCES orders (id)
            )";

            $resultProducts = $connect->query($products);
            if(!$resultProducts) {
                echo "Error creating table products" . $connect->error;
            }

            $gallery = "CREATE TABLE IF NOT EXISTS gallery(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                product_id INT NOT NULL,
                gallery_img VARCHAR(500) NOT NULL,
                CONSTRAINT FK_gallery_products FOREIGN KEY (product_id) REFERENCES products (id)
            )";

            $resultGallery = $connect->query($gallery);
            if(!$resultGallery) {
                echo "Error creating table gallery" . $connect->error;
            }

            $colors = "CREATE TABLE IF NOT EXISTS colors(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                color_name VARCHAR(100) NOT NULL
            )";

            $resultColors = $connect->query($colors);
            if(!$resultColors) {
                echo "Error creating table colors" . $connect->error;
            }

            $color_product = "CREATE TABLE IF NOT EXISTS color_product(
                product_id INT NOT NULL,
                color_id INT NOT NULL,
                CONSTRAINT PK_color_product PRIMARY KEY (product_id, color_id),
                CONSTRAINT FK_colorProduct_products FOREIGN KEY (product_id) REFERENCES products (id),
                CONSTRAINT FK_colorProduct_colors FOREIGN KEY (color_id) REFERENCES colors (id)
            )";

            $resultColorProduct = $connect->query($color_product);
            if(!$resultColorProduct) {
                echo "Error creating table color_product" . $connect->error;
            }

            $sizes = "CREATE TABLE IF NOT EXISTS sizes(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                size_name VARCHAR(10)
            )";

            $resultSizes = $connect->query($sizes);
            if(!$resultSizes) {
                echo "Error creating table sizes" . $connect->error;
            }

            $size_product = "CREATE TABLE IF NOT EXISTS size_product(
                product_id INT NOT NULL,
                size_id INT NOT NULL,
                CONSTRAINT PK_size_product PRIMARY KEY (product_id, size_id),
                CONSTRAINT FK_sizeProduct_products FOREIGN KEY (product_id) REFERENCES products (id),
                CONSTRAINT FK_sizeProduct_sizes FOREIGN KEY (size_id) REFERENCES sizes (id)
            )";

            $resultSizeProduct = $connect->query($size_product);
            if(!$resultSizeProduct) {
                echo "Error creating table size_product" . $connect->error;
            }


            $contacts = "CREATE TABLE IF NOT EXISTS contacts(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                full_name VARCHAR(200) NOT NULL,
                email VARCHAR(150) NOT NULL,
                feedback VARCHAR(500) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )"; 

            $resultContacts = $connect->query($contacts);
            if(!$resultContacts) {
                echo "Error creating table contacts" . $connect->error;
            }

        }
    }catch(Exception $e) {
        echo $e->getMessage();
    }
}

//CREATE DB



?>
