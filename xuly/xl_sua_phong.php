<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaPhong = $_GET['id'];
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

    $query01 = "SELECT * FROM `phong` WHERE SoPhong = '$SoPhong' AND NOT MaPhong = '$MaPhong'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Phòng này đã tồn tại!!");
            location.href = '../view/roommanager/edit.php?id=<?php echo $MaPhong; ?>';
        </script>
        <?php
    }
    else
    {
        $query02 = "UPDATE `phong` SET `SoPhong`='$SoPhong',`LoaiPhong`='$LoaiPhong',`TenPhong`='$TenPhong',`TienIchPhong`='$TienIchPhong',`SoNguoiToiDa`='$SoNguoiToiDa',`GiaPhong`='$GiaPhong',`DienTich`='$DienTich',`Giuong`='$Giuong',`MoTa1`='$MoTa1',`MoTa2`='$MoTa2',`Hinh`='$Hinh' WHERE MaPhong = '$MaPhong'";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            location.href = '../view/roommanager/edit.php?id=<?php echo $MaPhong; ?>';
        </script>
        <?php
    }
?>