<?php 
    require_once ('./inc/header.php');

    if(isset($_POST['btnLogin'])) {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $password_hash = sha1($password);

        $stmt = $connect->prepare("SELECT email,phone_number, [password] FROM maverick_dresses WHERE email = ? AND [password] = ? OR phone_number = ? AND [password] = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $resultArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
        if (count($resultArray) > 0) {
            // start the session
            // session_start();

            // $userInfo = $resultArray[0];
            // $_SESSION['userInfo'] = $userInfo;

            header("Location: index.php");
        } else {
            echo "Login failed";
        }
    }
?>

<div class="user-controls">
    <div class="form-signup">
        <form action="./login.html">
            <div class="popup" id="signup-popup"> 
                <div class="close-btn" id="close-button-signup">&times;</div>
                <div class="form">
                    <h2>ĐĂNG NHẬP</h2>
                    <div class="form-element">
                        <input type="text" id="email-signup" placeholder="Email/Số điện thoại" name="username">
                    </div>
                    <div class="form-element">
                        <input type="password" id="password-signup" placeholder="Password" name="password">
                    </div>
                    <div class="form-element">
                        <input type="checkbox" id="remember-me-signup">
                        <label for="remember-me-signup">Ghi nhớ</label>
                    </div>
                    <div class="form-element">
                        <button  type="submit" id="signup-button" name="btnLogin"> Đăng nhập</button >
                    </div>
                    <div class="form-element">
                        <a href="#">Forgot password</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="user-controls">
    <button class="login-button" id="show-signin">Đăng ký</button>
</div>
        
<?php require_once ('./inc/footer.php');?>
       