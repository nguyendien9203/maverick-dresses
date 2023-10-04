<?php 
    require_once __DIR__ . './config/config.php';
    require_once ('./inc/header.php');

    $errors = [];
    $success = "";
    if(isset($_POST['btn_register'])) {
        $full_name = sanitize($_POST['txt_fullName']);
        $password = sanitize($_POST['txt_password']);
        $rePassword = sanitize($_POST['txt_rePassword']);
        $email = sanitize($_POST['txt_email']);
        $phone_number = sanitize($_POST['txt_phoneNumber']);
        $address = sanitize($_POST['txt_address']);

          
        if(empty($full_name) && empty($email) && empty($phone_number) && empty($address) && empty($password)) {
            $errors[] = "Vui lòng nhập đầy đủ thông tin";
        }else if ($full_name == '') {
            $errors['txt_fullName'] = "Họ và tên không được để trống";
        }else if($email == '') {
            $errors['txt_email'] = "Email không được để trống";
        }else if($phone_number == '') {
            $errors['txt_phoneNumber'] = "Số điện thoại không được để trống";
        }else if($address == '') {
            $errors['txt_address'] = "Địa chỉ không được để trống";
        }else if($password == '') {
            $errors['txt_password'] = "Mật khẩu không được để trống";
        }else if($rePassword == '') {
            $errors['txt_rePassword'] = "Cần xác nhận lại mật khẩu";
        }else if($password !== $rePassword) {
            $errors['txt_rePassword'] = "Xác nhận mật khẩu không khớp";
        }else {
            $password_hashed = sha1($password);

            $stmt = $connect->prepare("SELECT * FROM users WHERE email = ? OR phone_number = ?");
            $stmt->bind_param("ss", $email, $phone_number);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows > 0) {
                $error[] = "Tài khoản đã tồn tại";
                exit();
            }else {
                $stmt = $connect->prepare("INSERT INTO users (full_name, password, email, phone_number, address) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $full_name, $password_hashed, $email, $phone_number, $address);
                $result = $stmt->execute();
                if($result) {
                    $success = "Đăng ký thành công";
                    
                    header("Location: login.php");
                }else {
                    $errors[] = "Đăng ký thất bại";
                }
                

                
            }
        }
    }
?>
<div class="resignterForm">
    <form action="" method="POST">
        <h2>ĐĂNG KÝ</h2>
        


        <?php if(!empty($success)) echo "<p class='success' style='background-color: green; color: white; padding: 10px; margin-bottom: 20px; border-radius: 5px;'> $success  </p>"; ?>

        <?php
            if(count($errors) > 0) {
                foreach($errors as $error) {
                    echo "<p class='error' style='background-color: red; color: white; padding: 10px; margin-bottom: 20px; border-radius: 5px;'>$error</p>";
                }
            }
            
        ?>
        
        <div class="form-element">
            <input type="text"  placeholder="Họ và tên" name="txt_fullName">
        </div>
                
                
        <div class="form-element">
            <input type="text"  placeholder="Email" name="txt_email">
        </div>

        <div class="form-element">
            <input type="text"  placeholder="Số Điện Thoại" name="txt_phoneNumber">
        </div>

        <div class="form-element">
            <input type="text"  placeholder="Địa chỉ" name="txt_address">
        </div>

        <div class="form-element">
            <input type="password" placeholder="Mật khẩu" name="txt_password">
        </div>

        <div class="form-element">
            <input type="password" placeholder="Nhập lại mật khẩu" name="txt_rePassword">
        </div>
        
        <div class="form-element">
            <button type="submit" name="btn_register">Đăng ký</button>
        </div>
        <div class="link-element">
            <a href="login.php">Bạn đã có tài khoản?</a>
        </div>
    </form>
</div>
<?php require_once ('./inc/footer.php'); ?>