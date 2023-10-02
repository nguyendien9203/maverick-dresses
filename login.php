<?php 
    require_once __DIR__ . './config/config.php';
    require_once ('./inc/header.php');

    $errors = [];
    
    if(isset($_POST['btnLogin'])) {
        $email = sanitize($_POST['txt_email']);
        $password = sanitize($_POST['txt_password']);
        

        $userInfo = [];

        if(empty($email) && empty($password)) {
            $errors[] = "Vui lòng nhập đầy đủ thông tin";
        }else if ($email == '') {
            $errors[] = "Tên đăng nhập không được để trống";
        }else if($password == '') {
            $errors[] = "Mật khẩu không được để trống";
        }else {
            $password_hashed = sha1($password);

            $stmt = $connect->prepare("SELECT email FROM users WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password_hashed);
            $stmt->execute();
            $resultArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
            if (count($resultArray) > 0) {
                // start the session
                session_start();

                $_SESSION['userInfo'] = true;

                header("Location: welcome.php");
            } else {
                echo "Đăng nhập thất bại";
            }

            
        }

        
    }
?>

<div class="loginForm">
    <form action="" method="POST">
        <h2>ĐĂNG NHẬP</h2>
        <?php
            if(count($errors) > 0) {
                foreach($errors as $error) {
                    echo "<p class='error' style='background-color: red; color: white; padding: 10px; margin-bottom: 20px; border-radius: 5px;'>$error</p>";
                }
            }
            
        ?>
        <div class="form-element">
            <input type="text"  placeholder="Email" name="txt_email">
        </div>
        <div class="form-element">
            <input type="password" placeholder="Mật khẩu" name="txt_password">
        </div>
        <div class="form-element">
            <button type="submit" name="btnLogin">Đăng nhập</button>
        </div>
        <div class="link-element">
            <a href="">Bạn chưa có tài khoản?</a>
        </div>
    </form>
</div>
        
<?php require_once ('./inc/footer.php');?>
       