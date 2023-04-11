<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaPhong = mysqli_real_escape_string($con,$_POST['MaPhong']);
    $HoTen = mysqli_real_escape_string($con,$_POST['HoTen']);
    $CMND = mysqli_real_escape_string($con,$_POST['CMND']);
    $SDT = mysqli_real_escape_string($con,$_POST['SDT']);
    $NgayNhanPhong = mysqli_real_escape_string($con,$_POST['NgayNhanPhong']);
    $NgayTraPhong = mysqli_real_escape_string($con,$_POST['NgayTraPhong']);

    $query = "INSERT INTO `datphong`(`HoTen`, `CMND`, `SDT`, `NgayNhanPhong`, `NgayTraPhong`, `TrangThai`, `MaPhong`) 
                VALUES ('$HoTen','$CMND','$SDT','$NgayNhanPhong','$NgayTraPhong',DEFAULT,'$MaPhong')";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
  
    ?>
    <script>
        alert("Đặt phòng thành công");
        location.href = '../view/tabBooking/bookingRoom.php';
    </script>
?>