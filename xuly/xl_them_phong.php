<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $SoPhong = mysqli_real_escape_string($con,$_POST['SoPhong']);
    $LoaiPhong = mysqli_real_escape_string($con,$_POST['LoaiPhong']);
    $TenPhong = mysqli_real_escape_string($con,$_POST['TenPhong']);
    $TienIchPhong = mysqli_real_escape_string($con,$_POST['TienIchPhong']);
    $SoNguoiToiDa = mysqli_real_escape_string($con,$_POST['SoNguoiToiDa']);
    $DienTich = mysqli_real_escape_string($con,$_POST['DienTich']);
    $GiaPhong = mysqli_real_escape_string($con,$_POST['GiaPhong']);
    $Giuong = mysqli_real_escape_string($con,$_POST['Giuong']);
    $MoTa1 = mysqli_real_escape_string($con,$_POST['MoTa1']);
    $MoTa2 = mysqli_real_escape_string($con,$_POST['MoTa2']);
    $Hinh = mysqli_real_escape_string($con,$_POST['Hinh']);

    $query01 = "SELECT * FROM `phong` WHERE SoPhong = '$SoPhong'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Phòng này đã tồn tại!!");
            location.href = '../view/roommanager/create.php';
        </script>
        <?php
    }
    else
    {
        $query02 = "INSERT INTO `phong`(`SoPhong`, `LoaiPhong`, `TenPhong`, `TienIchPhong`, `SoNguoiToiDa`, `GiaPhong`, `TrangThai`, `DienTich`, `Giuong`, `MoTa1`, `MoTa2`, `Hinh`) 
                    VALUES ('$SoPhong','$LoaiPhong','$TenPhong','$TienIchPhong','$SoNguoiToiDa','$GiaPhong',DEFAULT,'$DienTich','$Giuong','$MoTa1','$MoTa2','$Hinh')";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        ?>
        <script>
            alert("Thêm thành công");
            location.href = '../view/roommanager/list.php';
        </script>
        <?php
    }
?>