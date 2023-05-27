<?php
    require '../connect/connect.php';
    $con = ketnoi();

    $MaDP = mysqli_real_escape_string($con,$_POST['MaDP']);
    $MaDV = mysqli_real_escape_string($con,$_POST['MaDV']);
    $NgayDat = date("d/m/Y");

    $query = "INSERT INTO `chitietdatdichvu`(`MaDP`, `MaDV`, `NgayDat`, `TrangThai`) 
                VALUES ('$MaDP','$MaDV','$NgayDat',DEFAULT)";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
 
    echo json_encode(1);
?>