<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaTK = $_GET['id'];
    $MaNV = mysqli_real_escape_string($con,$_POST['MaNV']);
    $TenNV = mysqli_real_escape_string($con,$_POST['TenNV']);
    $CMND = mysqli_real_escape_string($con,$_POST['CMND']);
    $SDT = mysqli_real_escape_string($con,$_POST['SDT']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $TaiKhoan = mysqli_real_escape_string($con,$_POST['TaiKhoan']);
    $MatKhau = mysqli_real_escape_string($con,$_POST['MatKhau']);
    $Role = mysqli_real_escape_string($con,$_POST['Role']);

    $query01 = "SELECT * FROM `taikhoan` WHERE (`MaNV` = '$MaNV' OR `CMND` = '$CMND') AND NOT `MaTK` = '$MaTK'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));

    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Nhân viên này đã tồn tại!!");
            location.href = '../view/Employee/editEmployee.php?id=<?php echo $MaTK; ?>';
        </script>
        <?php
    }
    else
    {
        $query02 = "SELECT * FROM `taikhoan` WHERE TaiKhoan = '$TaiKhoan' AND NOT `MaTK` = '$MaTK'";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        if(mysqli_num_rows($result02) > 0)
        {
            ?>
            <script>
                alert("Tài khoản này đã tồn tại!!");
                location.href = '../view/Employee/editEmployee.php?id=<?php echo $MaTK; ?>';
            </script>
            <?php
        }
        else
        {
            $query03 = "UPDATE `taikhoan` SET `MaNV`='$MaNV',`TaiKhoan`='$TaiKhoan',`MatKhau`='$MatKhau',`TenNV`='$TenNV',`CMND`='$CMND',`SDT`='$SDT',`Email`='$Email',`Role`='$Role' WHERE `MaTK` = '$MaTK'";
            $result03 = mysqli_query($con,$query03) or die(mysqli_error($con));
            ?>
            <script>
                alert("Sửa thành công");
                location.href = '../view/Employee/employeelist.php';
            </script>
            <?php
        }
    }
?>