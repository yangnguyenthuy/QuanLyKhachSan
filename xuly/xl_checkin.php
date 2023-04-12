<?php
    require '../connect/connect.php';
    $con = ketnoi();

    $HoTenKH = mysqli_real_escape_string($con,$_POST['HoTenKH']);
    $TinhTrangHoaDon = mysqli_real_escape_string($con,$_POST['TinhTrangHoaDon']);
    $SDT = mysqli_real_escape_string($con,$_POST['SDT']);
    $NgayCheckIn = mysqli_real_escape_string($con,$_POST['NgayCheckIn']);
    $NgayCheckOut = mysqli_real_escape_string($con,$_POST['NgayCheckOut']);
    $SoPhong = mysqli_real_escape_string($con,$_POST['SoPhong']);
    $LoaiPhong = mysqli_real_escape_string($con,$_POST['LoaiPhong']);
    $GiaPhong = mysqli_real_escape_string($con,$_POST['GiaPhong']);

    $query = "SELECT * FROM `phong` WHERE SoPhong = '$SoPhong'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    $MaPhong = $row['MaPhong'];
    $GiaPhong = $row['GiaPhong'];
    $NgayLap = date("d/m/Y");

    $query01 = "INSERT INTO `hoadon`(`NgayLap`,`TongTriGia`, `TrangThai`) VALUES ('$NgayLap','$GiaPhong',DEFAULT)";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));

    $query02 = "SELECT MAX(`MaHD`) FROM `hoadon`";
    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
    $row02 = mysqli_fetch_assoc($result02);
    $MaHD = $row02['MAX(`MaHD`)'];
    $SoHD = "HD".$row02['MAX(`MaHD`)'];

    $update = "UPDATE `hoadon` SET `SoHD`='$SoHD' WHERE MaHD = '$MaHD'";
    $updateresult = mysqli_query($con,$update) or die(mysqli_error($con));

    $query03 = "INSERT INTO `checkin`(`HoTenKH`, `SDT`, `NgayCheckIn`, `NgayCheckOut`, `MaPhong`, `MaHD`) 
                VALUES ('$HoTenKH','$SDT','$NgayCheckIn','$NgayCheckOut','$MaPhong','$MaHD')";
    $result03 = mysqli_query($con,$query03) or die(mysqli_error($con));
?>
<script>
    alert("Check In thành công");
    location.href = '../view/TabInOut/checkIn.php';
</script>