<?php
    require '../connect/connect.php';
    $con = ketnoi();
    
    //$MaLoaiPhong = mysqli_real_escape_string($con,$_POST['MaLoaiPhong']);
    $TenLoaiPhong = mysqli_real_escape_string($con,$_POST['TenLoaiPhong']);
    $GiaLoaiPhong = mysqli_real_escape_string($con,$_POST['GiaLoaiPhong']);
    $MoTaLoaiPhong = mysqli_real_escape_string($con,$_POST['MoTaLoaiPhong']);

    $query01 = "SELECT * FROM `loaiphong` WHERE TenLoaiPhong = '$TenLoaiPhong'";
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    if(mysqli_num_rows($result01) > 0)
    {
        ?>
        <script>
            alert("Loại phòng này đã tồn tại!!");
            location.href = '../view/roommanager/typelist.php';
        </script>
        <?php
    }
    else
    {
        if(!empty($_FILES["Hinh"]["name"]))
        {
            $fileName = basename($_FILES["Hinh"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $file_path = "C:\\xampp\htdocs\QuanLyKhachSan\style\img\\room\\";

            $imgContent = addslashes(file_get_contents($file_path.$fileName));  

            $query02 = "INSERT INTO `loaiphong`(`TenLoaiPhong`, `GiaLoaiPhong`, `MoTaLoaiPhong`, `Hinh`) 
                        VALUES ('$TenLoaiPhong','$GiaLoaiPhong','$MoTaLoaiPhong','$imgContent')";
            $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
        }
        ?>
        <script>
            alert("Thêm thành công");
            location.href = '../view/roommanager/typelist.php';
        </script>
        <?php
    }
?>