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
<div class="resignterForm">
    <form action="">
        <h2>ĐĂNG KÝ</h2>
        <div class="form-element">
            <input type="text"  placeholder="Họ và tên">
        </div>
        <div class="form-element">
            <input type="text"  placeholder="Email">
        </div>
        <div class="form-element">
            <input type="text"  placeholder="Số Điện Thoại">
        </div>
        <div class="form-element">
            <input type="text"  placeholder="Địa chỉ">
        </div>
        <div class="form-element">
            <input type="password" placeholder="Mật khẩu">
        </div>
        <div class="form-element">
            <input type="password" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="form-element">
            <button type="submit">Đăng ký</button>
        </div>
        <div class="link-element">
            <a href="">Bạn đã có tài khoản?</a>
        </div>
    </form>
</div>
<?php require_once ('./inc/footer.php');?>