<?php
    require '../connect/connect.php';
    $con = ketnoi();

    $MaDatDV = mysqli_real_escape_string($con,$_POST['MaDatDV']);
    $MaHD = mysqli_real_escape_string($con,$_POST['MaHD']);
    $MaDV = mysqli_real_escape_string($con,$_POST['MaDV']);

    $query = "DELETE FROM `datdichvu` WHERE MaDatDV = '$MaDatDV'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));

    $query02 = "SELECT * FROM `dichvu` WHERE MaDV = '$MaDV'";
    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
    $row02 = mysqli_fetch_assoc($result02);
    $GiaDV = $row02['GiaDV'];

    $query03 = "UPDATE `hoadon` SET `TongTriGia`= TongTriGia - $GiaDV WHERE MaHD = '$MaHD'";
    $result03 = mysqli_query($con,$query03) or die(mysqli_error($con));

    echo json_encode(1);
?>