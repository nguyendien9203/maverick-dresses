<?php 
    require_once ('./inc/header.php');

    if(isset($_POST['btnRegister'])) {
        $full_name = sanitize($_POST['full_name']);
        $password = sanitize($_POST['password']);
        $password_hashed = sha1($password);
        $email = sanitize($_POST['email']);
        $phone_number = sanitize($_POST['phone_number']);
    
        //CHECK USERNAME EXISTS
        $checkUsername = "SELECT * FROM users WHERE username = '$username'";
        $result = $connect->query($checkUsername);
    
        if($result->num_rows > 0) {
            echo "Username already exists";
        } else {
            $insertDataUsers = "INSERT INTO users (username, password, email) 
                                VALUES ('$username', '$password_hashed', '$email')";
            $result = $connect->query($insertDataUsers);
            if($result) {
                $success = true;
            }else {
                echo "Error inserting data: " . $connect->error;
            }
        }
    }
?>
<div form>
    <form action="">
        <div class="popup" id="signin-popup"> 
            <div class="close-btn" id="close-button-signin">&times;</div>
            <div class="form">
                <h2>ĐĂNG KÍ</h2>
                <div class="form-element">
                    <input type="text" id="username-signin" placeholder="Họ và tên" name="full_name">
                </div>
                <div class="form-element">
                    <input type="text" id="email-signin" placeholder="Email" name="email">
                </div>
                <div class="form-element">
                    <input type="tex" id="phone-signin" placeholder="Số điện thoại" name="phone_number">
                </div>
                <div class="form-element">
                    <input type="password" id="password-signin" placeholder="Mật khẩu" name="password">
                </div>
                <div class="form-element">
                    <input type="password" id="repeat-password-signin" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-element">
                    <button id="signin-button" type="submit" name="btnRegister">Đăng ký</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once ('./inc/footer.php');?>