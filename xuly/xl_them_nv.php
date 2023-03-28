<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaNV = mysqli_real_escape_string($con,$_POST['MaNV']);
    $TenNV = mysqli_real_escape_string($con,$_POST['TenNV']);
    $CMND = mysqli_real_escape_string($con,$_POST['CMND']);
    $SDT = mysqli_real_escape_string($con,$_POST['SDT']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $TaiKhoan = mysqli_real_escape_string($con,$_POST['TaiKhoan']);
    $MatKhau = mysqli_real_escape_string($con,$_POST['MatKhau']);
    $Role = mysqli_real_escape_string($con,$_POST['Role']);

    $query01 = "SELECT * FROM `taikhoan` WHERE MaNV = '$MaNV' OR CMND = '$CMND'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Nhân viên này đã tồn tại!!");
            location.href = '../view/Employee/createEmloyee.php';
        </script>
        <?php
    }
    else
    {
        $query02 = "SELECT * FROM `taikhoan` WHERE TaiKhoan = '$TaiKhoan'";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        if(mysqli_num_rows($result02) > 0)
        {
            ?>
            <script>
                alert("Tài khoản này đã tồn tại!!");
                location.href = '../view/Employee/createEmloyee.php';
            </script>
            <?php
        }
        else
        {
            $query03 = "INSERT INTO `taikhoan`(`MaNV`, `TaiKhoan`, `MatKhau`, `TenNV`, `CMND`, `SDT`, `Email`, `Role`, `TrangThai`) VALUES ('$MaNV','$TaiKhoan','$MatKhau','$TenNV','$CMND','$SDT','$Email','$Role',DEFAULT)";
            $result03 = mysqli_query($con,$query03) or die(mysqli_error($con));
            ?>
            <script>
                alert("Thêm thành công");
                location.href = '../view/Employee/employeelist.php';
            </script>
            <?php
        }
    }
?>