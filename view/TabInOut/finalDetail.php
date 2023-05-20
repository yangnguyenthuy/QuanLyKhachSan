<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../style/js/search.js"></script>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require '../Shared/sidebar.php'; ?>
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">

                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <?php require '../Shared/user_bar.php'; ?>

                </ul>

            </nav>

            <?php
                $MaDP = $_GET['id'];
                $query = "SELECT SoPhong, TenLoaiPhong, SoNguoiToiDa, NgayDatPhong, HoTen, NgayNhanPhong, chitietdatphong.TrangThai as TrangThaiDat, TenNV, MaDP  
                            FROM `chitietdatphong` 
                                JOIN phong ON chitietdatphong.MaPhong = phong.MaPhong
                                JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                                JOIN khachhang ON chitietdatphong.MaKH = khachhang.MaKH
                                JOIN nhanvien ON chitietdatphong.MaNV = nhanvien.MaNV
                            WHERE `MaDP` = '$MaDP'";
                    
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($result);
            ?>

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                                <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Chi tiết đặt phòng</h6>
                                <?php
                                    $query_hd = "SELECT * FROM `hoadon` WHERE `MaDP` = '$MaDP'";
                                    $result_hd = mysqli_query($con,$query_hd) or die(mysqli_error($con));
                                    if(mysqli_num_rows($result_hd) != 0)
                                    {
                                        $row_hd = mysqli_fetch_assoc($result_hd);
                                        ?>
                                        <a href="../Bill/xemHoaDon.php?id=<?php echo $row_hd['MaHD']; ?>">
                                            <button class="btn btn-info btn-fill pull-right">Xem hóa đơn</button>
                                        </a>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <a onclick="LapHoaDon(<?php echo $row['MaDP']; ?>)">
                                            <button class="btn btn-info btn-fill pull-right">Lập hóa đơn</button>
                                        </a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="wrapper row" style="flex-direction: row; padding: 10px;">
                            <div class="preview col-md-6"> 
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1"><img style="width:80%;" src="../../style/img/room/room-1.jpg" /></div>
                                </div>                                    
                            </div>
                            <div class="details col-md-6">
                                <h1><?php echo $row['SoPhong']; ?></h3>
                                <p>Loại phòng: <?php echo $row['TenLoaiPhong']; ?></p>
                                <p>Số người ở tối đa: <?php echo $row['SoNguoiToiDa']; ?></p>
                                <p>Ngày đặt: <?php echo $row['NgayDatPhong']; ?></p>
                                <p>Người đặt: <?php echo $row['HoTen']; ?></p>
                                <p>Ngày nhận phòng: <?php echo $row['NgayNhanPhong']; ?></p>
                                <p>Tình trạng: <?php if($row['TrangThaiDat'] == "Confirm") echo "Chưa trả phòng"; else if($row['TrangThaiDat'] == "Return") echo "Đã trả phòng"; ?></p>
                                <p>Nhân viên đặt: <?php echo $row['TenNV']; ?></p>
                            </div>
                        </div>

                        <div class="card-body">
                            <h1 class="h3 mb-2 text-gray-800">Danh sách khách ở</h1>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên khách hàng</th>
                                            <th>CMND</th>
                                            <th>Số điện thoại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query01 = "SELECT * FROM `chitietkhacho` WHERE `MaDP` = '$MaDP'";
                                            $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
                                            $stt = 1;
                                            while($row01 = mysqli_fetch_assoc($result01))
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $stt; ?></td>
                                                    <td><?php echo $row01['HoTen_KhachO']; ?></td>
                                                    <td><?php echo $row01['CMND_KhachO']; ?></td>
                                                    <td><?php echo $row01['SDT_KhachO']; ?></td>
                                                </tr>
                                                <?php
                                                $stt++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-body">
                            <h1 class="h3 mb-2 text-gray-800">Danh sách dịch vụ sử dụng</h1>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Giá dịch vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query02 = "SELECT * 
                                                        FROM `chitietdatdichvu` 
                                                        JOIN dichvu ON chitietdatdichvu.MaDV = dichvu.MaDV 
                                                        WHERE `MaDP` = '$MaDP' AND NOT chitietdatdichvu.TrangThai = 'Cancel'";
                                            $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
                                            $stt_dv = 1;
                                            while($row02 = mysqli_fetch_assoc($result02))
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $stt_dv; ?></td>
                                                    <td><?php echo $row02['TenDV']; ?></td>
                                                    <td><?php echo $row02['GiaDV']; ?></td>
                                                </tr>
                                                <?php
                                                $stt_dv++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function LapHoaDon(dp_id) {
        $.post("../../xuly/xl_them_hoadon.php", {MaDP: dp_id}, function(returndata){
            location.href = "../Bill/xemHoaDon.php?id=" + returndata;
        });
    }
</script>
</html>