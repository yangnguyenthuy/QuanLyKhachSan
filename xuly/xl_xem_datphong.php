<?php
    if (!isset ($_GET['page'])) $page = 1;    
    else  $page = $_GET['page'];    

    $results_per_page = 10;

    $query = "SELECT `MaDP`,`NgayDatPhong`, chitietdatphong.`TrangThai`,`SoPhong`,`TenLoaiPhong`,`HoTen`, khachhang.CMND,khachhang.SDT, chitietdatphong.`MaPhong` as Phong 
                FROM `chitietdatphong` 
                    JOIN phong ON chitietdatphong.MaPhong = phong.MaPhong
                    JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                    JOIN khachhang ON chitietdatphong.MaKH = khachhang.MaKH
                    JOIN nhanvien ON chitietdatphong.MaNV = nhanvien.MaNV";
        
    $result = mysqli_query($con,$query) or die(mysqli_error($con));

    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_result / $results_per_page);

    $page_first_result = ($page - 1) * $results_per_page;

    $query01 = "SELECT `MaDP`,`NgayDatPhong`, chitietdatphong.`TrangThai`,`SoPhong`,`TenLoaiPhong`,`HoTen`, khachhang.CMND,khachhang.SDT, chitietdatphong.`MaPhong` as Phong 
                FROM `chitietdatphong` 
                    JOIN phong ON chitietdatphong.MaPhong = phong.MaPhong
                    JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                    JOIN khachhang ON chitietdatphong.MaKH = khachhang.MaKH
                    JOIN nhanvien ON chitietdatphong.MaNV = nhanvien.MaNV
                LIMIT ". $page_first_result . ',' . $results_per_page;
                    
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result01))
    {
        ?>
        <tr>
            <td><?php echo $row['SoPhong']; ?></td>
            <td><?php echo $row['NgayDatPhong']; ?></td>
            <td><?php echo $row['TenLoaiPhong']; ?></td>
            <td><?php echo $row['HoTen']; ?></td>
            <td><?php echo $row['SDT']; ?></td>
            <td><?php echo $row['CMND']; ?></td>
            <td>
                <?php
                    if($row['TrangThai'] == "Wait")
                    {
                        ?> 
                        <div style="font-weight: bolder; color:orange" class="">
                            Chưa check in
                        </div>
                        <?php
                    }
                    else if($row['TrangThai'] == "Confirm")
                    {
                        ?>
                        <div style="font-weight: bolder; color:#43E03A" class="">
                            Check-in
                        </div>
                        <?php
                    }
                    else if($row['TrangThai'] == "Return")
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
                    if($row['TrangThai'] == "Wait")
                    {
                        ?> 
                        <a href="../TabInOut/checkIn.php?id=<?php echo $row['MaDP']; ?>">
                            <button class="btn btn-info btn-fill">Check-in</button>
                        </a>
                        <?php
                    }
                    else if($row['TrangThai'] == "Confirm" )
                    {
                        ?>
                        <a href="../tabBooking/bookingDetail.php?id=<?php echo $row['MaDP']; ?>">
                            <button class="btn btn-info btn-fill">Xem</button>
                        </a>
                        <?php
                    }
                    else if($row['TrangThai'] == "Return")
                    {
                        ?>
                        <a href="../TabInOut/finalDetail.php?id=<?php echo $row['MaDP']; ?>">
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
                    if($row['TrangThai'] == "Wait")
                    {
                        ?>
                        <a onclick="Cancel(<?php echo $row['MaDP']; ?>,<?php echo $row['Phong']; ?>)">
                            <button type="submit" class="btn btn-info btn-fill">Cancel</button>
                        </a>
                        <?php
                    }
                ?>
            </td>
        </tr>
        <?php
    }
?>