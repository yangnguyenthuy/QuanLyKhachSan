<?php
    require '../connect/connect.php';
    $con = ketnoi();

    $id = $_POST['id'];
    $data = array();;

    switch($id)
    {
        case 1:
        {
            $query = "SELECT TenLoaiPhong, COUNT(phong.MaLoaiPhong) AS SoLoaiPhong
                        FROM `chitietdatphong` 
                            JOIN phong ON chitietdatphong.MaPhong = phong.MaPhong
                            JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                        GROUP BY TenLoaiPhong";
            $stmt =  mysqli_query($con,$query);

            if(mysqli_num_rows($stmt) > 0){
                while($result = mysqli_fetch_assoc($stmt))
                {
                    $data[] = $result;
                }
            }

            echo json_encode($data);
            break;
        }
        case 2:
        {
            $query = "SELECT TenDV, COUNT(chitietdatdichvu.MaDV) AS SoLuongDV
                        FROM `chitietdatdichvu`
                            JOIN `dichvu` ON chitietdatdichvu.MaDV = dichvu.MaDV 
                        WHERE NOT chitietdatdichvu.TrangThai = 'Cancel'
                        GROUP BY TenDV";
            $stmt =  mysqli_query($con,$query);

            if(mysqli_num_rows($stmt) > 0){
                while($result = mysqli_fetch_assoc($stmt))
                {
                    $data[] = $result;
                }
            }

            echo json_encode($data);
            break;
        }
        case 5:
        {
            $query = "SELECT TenQuyen, COUNT(`MaTK`) AS SoTaiKhoan 
                        FROM `taikhoan` 
                            JOIN nhanvien ON taikhoan.MaNV = nhanvien.MaNV
                            JOIN quyen ON taikhoan.MaQuyen = quyen.MaQuyen
                        WHERE `TrangThai` = 'Enable'
                        GROUP BY TenQuyen";
            $stmt =  mysqli_query($con,$query);

            if(mysqli_num_rows($stmt) > 0){
                while($result = mysqli_fetch_assoc($stmt))
                {
                    $data[] = $result;
                }
            }

            echo json_encode($data);
            break;
        }
    }
?>
