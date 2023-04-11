<?php
    require '../connect/connect.php';
    $con = ketnoi();
    $Place = $_GET['place'];
    $id = $_GET['id'];
    switch($Place)
    {
        case 'TK':
        {
            $Disable_TK_Query = "UPDATE `taikhoan` SET `TrangThai`='Disable' WHERE `MaTK` = '$id'";
            $Disable_TK_Result = mysqli_query($con,$Disable_TK_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Vô hiệu hóa thành công");
                location.href = '../view/Employee/employeelist.php';
            </script>
            <?php
            break;
        }
        case 'ROOM':
        {
            $Disable_Room_Query = "UPDATE `phong` SET `TrangThai`='Disable' WHERE `MaPhong` = '$id'";
            $Disable_Room_Result = mysqli_query($con,$Disable_Room_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Vô hiệu phòng thành công");
                location.href = '../view/roommanager/list.php';
            </script>
            <?php
            break;
        }
        case 'DV':
        {
            $Disable_DV_Query = "UPDATE `dichvu` SET `TrangThai`='Disable' WHERE `MaDV` = '$id'";
            $Disable_DV_Result = mysqli_query($con,$Disable_DV_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Vô hiệu dịch vụ thành công");
                location.href = '../view/TabService/serviceTab.php';
            </script>
            <?php
            break;
        }
    }
?>