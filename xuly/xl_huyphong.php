<?php
    require '../connect/connect.php';
    $con = ketnoi();

    $MaDP = mysqli_real_escape_string($con,$_POST['MaDP']);
    $MaPhong = mysqli_real_escape_string($con,$_POST['MaPhong']);

    $query01 = "UPDATE `datphong` SET `TrangThai`='Cancel' WHERE MaDP = '$MaDP'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));

    $query02 = "UPDATE `phong` SET `TrangThai`='Empty' WHERE MaPhong = '$MaPhong'";
    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));

    echo json_encode(1);
?>