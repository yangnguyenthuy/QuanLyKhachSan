<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaDV = $_GET['id'];
    $LoaiDV = mysqli_real_escape_string($con,$_POST['LoaiDV']);
    $TenDV = mysqli_real_escape_string($con,$_POST['TenDV']);
    $GiaDV = mysqli_real_escape_string($con,$_POST['GiaDV']);
    $MoTa = mysqli_real_escape_string($con,$_POST['MoTa']);

    $query01 = "SELECT * FROM `dichvu` WHERE TenDV = '$TenDV' AND NOT `MaDV` = '$MaDV'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));

    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Dịch vụ này đã tồn tại!!");
            location.href = '../view/TabService/editServiceTab.php?id=<?php echo $MaDV; ?>';
        </script>
        <?php
    }
    else
    {
        $query02 = "UPDATE `dichvu` SET `LoaiDV`='$LoaiDV',`TenDV`='$TenDV',`GiaDV`='$GiaDV',`MoTa`='$MoTa' WHERE MaDV = '$MaDV'";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            location.href = '../view/TabService/editServiceTab.php?id=<?php echo $MaDV; ?>';
        </script>
        <?php
    }
?>