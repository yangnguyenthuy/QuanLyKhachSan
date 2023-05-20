<?php
    require '../connect/connect.php';
    $con = ketnoi();
    session_start();

    $SearchInput = mysqli_real_escape_string($con,$_POST['SearchInput']);
    $Key = mysqli_real_escape_string($con,$_POST['Key']);

    switch($Key)
    {
        case 'NV':
        {
            $query = "SELECT * 
                        FROM `taikhoan`
                            JOIN `nhanvien` ON taikhoan.MaNV = nhanvien.MaNV
                        WHERE TenNV LIKE '%{$SearchInput}%' ";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
            if($num = mysqli_num_rows($result) == 0)
            {
                ?>
                <tr>
                    <td colspan="8"> Không tìm thấy kết quả </td>
                </tr>
                <?php
            }
            else
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['MaNV']; ?></td>
                        <td><?php echo $row['TenNV']; ?></td>
                        <td><?php echo $row['SDT']; ?></td>
                        <td><?php echo $row['TaiKhoan']; ?></td>
                        <td><?php echo $row['MatKhau']; ?></td>
                        <td><?php echo $row['ChucVu']; ?></td>
                        <td><a href="./viewEmployee.php?id=<?php echo $row['MaTK']; ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Xem
                                </button></td>
                        <td><a><button class="btn btn-info btn-fill pull-right" data-toggle="modal"
                                    data-id="<?php echo $row['MaTK']; ?>"
                                    data-target="#delete-employee-modal">Xoá</button></a> </td>


                    </tr>
                    <?php
                }
            }
            break;
        }
        case 'Phong':
        {
            $query = "SELECT * 
                        FROM `phong` 
                            JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                        WHERE SoPhong LIKE '%{$SearchInput}%'";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            if(mysqli_num_rows($result) == 0) 
            {
                ?>
                <tr>
                    <td colspan="9"> Không tìm thấy kết quả </td>
                </tr>
                <?php
            }
            else
            {
                while($row = mysqli_fetch_assoc($result))   
                {
                    ?>
                    <tr>
                        <td><?php echo $row['SoPhong']; ?></td>
                        <td><?php echo $row['TenLoaiPhong']; ?></td>
                        <td><?php echo $row['DienTich']; ?></td>
                        <td><?php echo $row['TienIchPhong']; ?></td>
                        <td><?php echo $row['SoNguoiToiDa']; ?></td>
                        <td><?php echo $row['GiaLoaiPhong']; ?></td>
    
                        <td>
                            <?php
                                if($row['TrangThai'] == "Occupied")
                                {
                                    ?>
                                    <div style="font-weight: bolder; color:red" class="">
                                        Thuê
                                    </div>
                                    <?php
                                }
                                else if($row['TrangThai'] == "Empty")
                                {
                                    ?>
                                    <div style="font-weight: bolder; color:#43E03A" class="">
                                        Trống
                                    </div>
                                    <?php
                                }
                                else if($row['TrangThai'] == "Book")
                                {
                                    ?>
                                    <div style="font-weight: bolder; color:orange" class="">
                                        Đặt trước
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div style="font-weight: bolder; color:red" class="">
                                        Dừng hoạt động
                                    </div>
                                    <?php
                                }
                            ?>
                        </td>
                        <td><a href="./view.php?id=<?php echo $row['MaPhong']; ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Xem
                                </button></td>
                        <?php 
                            if($_SESSION['TenQuyen'] == "Admin" || $_SESSION['TenQuyen'] == "Phòng Kinh Doanh") 
                            {
                                ?>
                                <td><a><button class="btn btn-info btn-fill pull-right" data-toggle="modal"
                                        data-id="<?php echo $row['MaPhong']; ?>"
                                        data-target="#delete-roommanager-modal">Dừng hoạt động</button></a> </td>
                                <?php
                            } 
                        ?>
                    </tr>
                    <?php
                }
            }   

            break;
        }
        case 'DV':
        {
            $query = "SELECT * FROM `dichvu` WHERE TenDV LIKE '%{$SearchInput}%'";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            if(mysqli_num_rows($result) == 0) 
            {
                ?>
                <tr>
                    <td colspan="6"> Không tìm thấy kết quả </td>
                </tr>
                <?php
            }
            else
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['MaDV']; ?></td>
                        <td><?php echo $row['TenDV']; ?></td>
                        <td><?php echo $row['GiaDV']; ?></td>
                        <td>
                            <?php
                                if($row['TrangThai'] == "Enable")
                                {
                                    ?>
                                    <div style="font-weight: bolder; color:#43E03A" class="">
                                        Đang hoạt động
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div style="font-weight: bolder; color:red" class="">
                                        Ngừng hoạt động
                                    </div>
                                    <?php
                                }
                            ?>
                        </td>
                        <td><a href="./serviceView.php?id=<?php echo $row['MaDV']; ?>">
                                <button type="submit" class="btn btn-info btn-fill">Chi tiết</button>
                        </td>
                        <?php
                            if($_SESSION['TenQuyen'] == "Admin" || $_SESSION['TenQuyen'] == "Phòng Kinh Doanh")
                            {
                                ?>
                                <td>
                                    <?php
                                        if($row['TrangThai'] == "Enable") 
                                        {
                                            ?>
                                            <a><button class="btn btn-info btn-fill pull-right" onclick="XacNhanHanhDong(<?php echo $row['MaDV']; ?>,'Disable')">Dừng hoạt động</button></a> 
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a><button class="btn btn-info btn-fill pull-right" onclick="XacNhanHanhDong(<?php echo $row['MaDV']; ?>,'Restore')">Khôi phục</button></a> 
                                            <?php
                                        }
                                    ?>
            
                                </td>
                                <?php
                            }
                        ?>
                    </tr>
                    <?php
                }
            
                break;
            }
        }
        case 'PhongDat':
        {
            $query = "SELECT * 
                        FROM `loaiphong` 
                        WHERE TenLoaiPhong LIKE '%{$SearchInput}%'";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            if(mysqli_num_rows($result) == 0) 
            {
                ?>
                <div class="ri-text">
                    Không tìm thấy kết quả!
                </div>
                <?php
            }
            else
            {
                while($row = mysqli_fetch_assoc($result))   
                {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Hinh']); ?>" alt="">
                            <div class="ri-text">
                                <h4><?php echo $row['TenLoaiPhong']; ?></h4>
                                <h3 class="room-price"><?php echo $row['GiaLoaiPhong']; ?><span>/NGÀY</span>
                                </h3>
                                <a href="./showSlug.php?id=<?php echo $row['MaLoaiPhong']; ?>" class="primary-btn">Đặt Ngay</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }   

            break;
        }
        case 'HoaDon':
        {
            $query = "SELECT * 
                        FROM `khachhang` 
                        WHERE HoTen LIKE '%{$SearchInput}%'";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            if(mysqli_num_rows($result) == 0)
            {
                ?>
                <tr>
                    <td colspan="5">Không tìm thấy thông tin khách hàng</td>
                </tr>
                <?php
            }
            else
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $MaKH = $row['MaKH'];
                    $query01 = "SELECT MaHD, HoTen, NgayLap, hoadon.TrangThai 
                                FROM `hoadon`
                                    JOIN `chitietdatphong` ON hoadon.MaDP = chitietdatphong.MaDP
                                    JOIN `khachhang` ON chitietdatphong.MaKH = khachhang.MaKH
                                WHERE chitietdatphong.MaKH = '$MaKH'";
                    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));

                    while($row01 = mysqli_fetch_assoc($result01))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row01['MaHD']; ?></td>
                            <td><?php echo $row01['HoTen']; ?></td>
                            <td><?php echo $row01['NgayLap']; ?></td>
                            <td><?php echo $row01['TrangThai']; ?></td>
                            <td><a href="../Bill/xemHoaDon.php?id=<?php echo $row01['MaHD']; ?>">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Xem
                                    </button></td>
                        </tr>
                        <?php
                    }
                }
            }

            break;
        }
        case 'DsDat':
        {
            $query = "SELECT * 
                        FROM `khachhang` 
                        WHERE HoTen LIKE '%{$SearchInput}%'";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            if(mysqli_num_rows($result) == 0)
            {
                ?>
                <tr>
                    <td colspan="8">Không tìm thấy thông tin khách hàng</td>
                </tr>
                <?php
            }
            else
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $MaKH = $row['MaKH'];
                    $query02 = "SELECT `MaDP`,`NgayDatPhong`, chitietdatphong.`TrangThai`,`SoPhong`,`TenLoaiPhong`,`HoTen`, khachhang.CMND,khachhang.SDT, chitietdatphong.`MaPhong` as Phong 
                                FROM `chitietdatphong` 
                                    JOIN phong ON chitietdatphong.MaPhong = phong.MaPhong
                                    JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                                    JOIN khachhang ON chitietdatphong.MaKH = khachhang.MaKH
                                    JOIN nhanvien ON chitietdatphong.MaNV = nhanvien.MaNV
                                WHERE chitietdatphong.MaKH = '$MaKH'";
                    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
                    while($row02 = mysqli_fetch_assoc($result02))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row02['SoPhong']; ?></td>
                            <td><?php echo $row02['NgayDatPhong']; ?></td>
                            <td><?php echo $row02['TenLoaiPhong']; ?></td>
                            <td><?php echo $row02['HoTen']; ?></td>
                            <td><?php echo $row02['SDT']; ?></td>
                            <td><?php echo $row02['CMND']; ?></td>
                            <td>
                                <?php
                                    if($row02['TrangThai'] == "Wait")
                                    {
                                        ?> 
                                        <div style="font-weight: bolder; color:orange" class="">
                                            Chưa check in
                                        </div>
                                        <?php
                                    }
                                    else if($row02['TrangThai'] == "Confirm")
                                    {
                                        ?>
                                        <div style="font-weight: bolder; color:#43E03A" class="">
                                            Check-in
                                        </div>
                                        <?php
                                    }
                                    else if($row02['TrangThai'] == "Return")
                                    {
                                        ?>
                                        <div style="font-weight: bolder; color:brown" class="">
                                            Done
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div style="font-weight: bolder; color:red" class="">
                                            Cancel
                                        </div>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($row02['TrangThai'] == "Wait")
                                    {
                                        ?> 
                                        <a href="../TabInOut/checkIn.php?id=<?php echo $row02['MaDP']; ?>">
                                            <button class="btn btn-info btn-fill">Check-in</button>
                                        </a>
                                        <?php
                                    }
                                    else if($row02['TrangThai'] == "Confirm" )
                                    {
                                        ?>
                                        <a href="../tabBooking/bookingDetail.php?id=<?php echo $row02['MaDP']; ?>">
                                            <button class="btn btn-info btn-fill">Xem</button>
                                        </a>
                                        <?php
                                    }
                                    else if($row02['TrangThai'] == "Return")
                                    {
                                        ?>
                                        <a href="../TabInOut/finalDetail.php?id=<?php echo $row02['MaDP']; ?>">
                                            <button class="btn btn-info btn-fill">Xem</button>
                                        </a>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <button type="submit" class="btn btn-info btn-fill" disabled>Cancel</button>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row02['TrangThai'] == "Wait")
                                    {
                                        ?>
                                        <a onclick="Cancel(<?php echo $row02['MaDP']; ?>,<?php echo $row02['Phong']; ?>)">
                                            <button type="submit" class="btn btn-info btn-fill">Cancel</button>
                                        </a>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
            }

            break;
        }
    }
?>