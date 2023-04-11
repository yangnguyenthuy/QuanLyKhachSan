<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../style/js/search.js"></script>
<body>
    

<!-- Page Wrapper -->
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
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <!-- End of Topbar -->

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Phiếu Check In -
                            Out</h6>
                    </div>

                    <?php
                        $MaCheckIn = $_GET['id'];
                        $query = "SELECT * FROM `checkin` WHERE MaCheckIn = '$MaCheckIn'";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($result);
                    ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="content">
                                                <!--Form store database-->
                                                <form method="POST" action="../../xuly/xl_sua_checkin.php">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Tên khách hàng</label>
                                                                <input id="HoTen" type="text" name="HoTenKH" class="form-control"
                                                                    placeholder="Nhập khách hàng"
                                                                    value="<?php echo $row['HoTenKH']; ?>">
                                                            </div>
                                                        </div>
                                                        <div style="display: none" class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tình trạng hóa đơn</label>
                                                                <input type="text" name="TinhTrangHoaDon"
                                                                    class="form-control"
                                                                    placeholder="Nhập tình trạng hóa đơn">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input id="SDT" type="text" name="SDT" class="form-control"
                                                                    placeholder="Nhập số điện thoại"
                                                                    value="<?php echo $row['SDT']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Ngày check-in</label>
                                                                <input type="text" name="NgayCheckIn" class="form-control"
                                                                    placeholder="Ngày checkin"
                                                                    value="<?php echo $row['NgayCheckIn']; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Ngày check-out</label>
                                                                <input type="text" name="NgayCheckOut" class="form-control"
                                                                    placeholder=""
                                                                    value="<?php echo $row['NgayCheckOut']; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php 
                                                        $MaHoaDon = $row['MaHD'];
                                                        $MaPhong = $row['MaPhong'];
                                                        $query01 = "SELECT * FROM `phong` WHERE MaPhong = '$MaPhong'";
                                                        $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
                                                        $row01 = mysqli_fetch_assoc($result01);
                                                    ?>
                                                    <!--cột 2-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Số phòng</label>
                                                                <input id="SoPhong" type="text" name="SoPhong" class="form-control"
                                                                    placeholder="Nhập số phòng"
                                                                    value="<?php echo $row01['SoPhong']; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Loại phòng</label>
                                                                <input id="LoaiPhong" type="text" name="LoaiPhong" class="form-control"
                                                                    placeholder="Nhập loại phòng"
                                                                    value="<?php echo $row01['LoaiPhong']; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Giá phòng</label>
                                                                <input id="GiaPhong" type="text" name="GiaPhong" class="form-control"
                                                                    placeholder="Nhập giá phòng"
                                                                    value="<?php echo $row01['GiaPhong']; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <a>                                    
                                                                    <button class="btn btn-info btn-fill pull-right">Cập nhật</button>     
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </br>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h1 class="h3 mb-2 text-gray-800">Danh sách dịch vụ đã đặt</h1>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 style="font-weight: bolder; font-size:20px;"
                                                    class="m-0 text-primary">Danh sách dịch vụ</h6>
                                                <!-- Search section -->
                                                <form action="/createIO/searchBooking">
                                                    <div class="input-group">
                                                        <input style="width:300px" type="text" name="q"
                                                            class="form-control mr-6 w-10" placeholder="Search">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã dịch vụ</th>
                                                            <th>Loại dịch vụ</th>
                                                            <th>Tên dịch vụ</th>
                                                            <th>Giá dịch vụ</th>
                                                            <!--<th>Mô tả</th>-->
                                                            <th>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dataTableDV">
                                                        <?php require '../../xuly/xl_xem_dichvudat_checkin.php'; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h1 class="h3 mb-2 text-gray-800">Danh sách dịch vụ</h1>

                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 style="font-weight: bolder; font-size:20px;"
                                                    class="m-0 text-primary">Danh sách dịch vụ</h6>
                                                <form action="/createIO/searchListRoom">
                                                    <div class="input-group">
                                                        <input style="width:300px" type="text" name="q"
                                                            class="form-control mr-6 w-10" placeholder="Search">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã dịch vụ</th>
                                                            <th>Loại dịch vụ</th>
                                                            <th>Tên dịch vụ</th>
                                                            <th>Giá dịch vụ</th>
                                                            <!--<th>Mô tả</th>-->
                                                            <th>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php require '../../xuly/xl_xem_dichvu_checkin.php'; ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- End of Content Wrapper -->

                </div>

            </div>
            <!-- End of Main Content -->

            <script>
                function DatDichVu(hd_id, dv_id) {
                    $.post("../../xuly/xl_datdichvu.php", {MaHD: hd_id, MaDV: dv_id}, function(returndata){
                        if(returndata == 1)
                            $("#dataTableDV").load(window.location.href + " #dataTableDV > *");
                    })
                }
                function HuyDichVu(ddv_id,hd_id,dv_id) {
                    $.post("../../xuly/xl_huydichvu.php", {MaDatDV: ddv_id, MaHD: hd_id, MaDV: dv_id}, function(returndata){
                        if(returndata == 1)
                            $("#dataTableDV").load(window.location.href + " #dataTableDV > *");
                    })
                }
            </script>
</body>
</html>