<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaDV = mysqli_real_escape_string($con,$_POST['MaDV']);
    $LoaiDV = mysqli_real_escape_string($con,$_POST['LoaiDV']);
    $TenDV = mysqli_real_escape_string($con,$_POST['TenDV']);
    $GiaDV = mysqli_real_escape_string($con,$_POST['GiaDV']);
    $MoTa = mysqli_real_escape_string($con,$_POST['MoTa']);

    $query01 = "SELECT * FROM `dichvu` WHERE MaDV = '$MaDV' OR TenDV = '$TenDV'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Dịch vụ này đã tồn tại!!");
            location.href = '../view/TabService/serviceTab.php';
        </script>
        <?php
    }
    else
    {
        $query02 = "INSERT INTO `dichvu`(`MaDV`, `LoaiDV`, `TenDV`, `GiaDV`, `MoTa`, `TrangThai`) VALUES ('$MaDV','$LoaiDV','$TenDV','$GiaDV','$MoTa',DEFAULT)";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        ?>
        <script>
            alert("Thêm thành công");
            location.href = '../view/TabService/serviceTab.php';
        </script>
        <?php
    }
?>