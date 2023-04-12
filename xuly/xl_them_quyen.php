<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    $MaQuyen = mysqli_real_escape_string($con,$_POST['MaQuyen']);
    $TenQuyen = mysqli_real_escape_string($con,$_POST['TenQuyen']);

    $query01 = "SELECT * FROM `quyen` WHERE MaQuyen = '$MaQuyen' OR TenQuyen = '$TenQuyen'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Quyền này đã tồn tại!!");
            location.href = '../view/Role/rolelist.php';
        </script>
        <?php
    }
    else
    {
        $query02 = "INSERT INTO `quyen`(`MaQuyen`, `TenQuyen`) VALUES ('$MaQuyen','$TenQuyen')";
        $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        ?>
        <script>
            alert("Thêm thành công");
            location.href = '../view/Role/rolelist.php';
        </script>
        <?php
    }
?>