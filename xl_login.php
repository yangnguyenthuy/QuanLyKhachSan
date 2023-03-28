<?php
    $username = mysqli_real_escape_string($con,$_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $query = "SELECT * FROM `taikhoan` WHERE TaiKhoan = '$username' AND MatKhau = '$password'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));

    if(mysqli_num_rows($result) == 0)
    {
        ?>
        <script>
            alert("Tài khoản hoặc mật khẩu chưa đúng");
        </script>
        <?php
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['TenNV'] = $row['TenNV'];
        header('location:./view/Admin/dashboard.php');
    }
?>