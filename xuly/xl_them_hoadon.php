<?php
    require '../connect/connect.php';
    $con = ketnoi();
    session_start();

    $MaDP = $_POST['MaDP']; 
    $NgayLap = date("d/m/Y");
    $MaNV = $_SESSION['MaNV'];

    $query = "INSERT INTO `hoadon`(`NgayLap`, `TrangThai`, `MaNV`, `MaDP`) 
            VALUES ('$NgayLap',DEFAULT,'$MaNV','$MaDP')";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));

    $query01 = "SELECT * FROM `hoadon` WHERE `MaDP` = '$MaDP'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    $row01 = mysqli_fetch_assoc($result01);

    echo json_decode($row01['MaHD']);
?>  