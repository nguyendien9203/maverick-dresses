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

<div class="loginForm">
    <form action="">
        <h2>ĐĂNG NHẬP</h2>
        <div class="form-element">
            <input type="text"  placeholder="Email/Số điện thoại">
        </div>
        <div class="form-element">
            <input type="password" placeholder="Mật khẩu">
        </div>
        <div class="form-element">
            <button type="submit">Đăng nhập</button>
        </div>
        <div class="link-element">
            <a href="">Bạn chưa có tài khoản?</a>
        </div>
    </form>
</div>
        
<?php require_once ('./inc/footer.php');?>
       