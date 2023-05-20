<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" charset="utf-8"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
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

        <?php
        $MaHD = $_GET['id'];
        $query01 = "SELECT * FROM `hoadon` WHERE MaHD = '$MaHD'";
        $result01 = mysqli_query($con, $query01) or die(mysqli_error($con));
        $row01 = mysqli_fetch_assoc($result01);
        $MaDP = $row01['MaDP'];
        $GiaTien = 0;

        $query02 = "SELECT `MaDP`,`NgayDatPhong`, chitietdatphong.`TrangThai`,`SoPhong`,`TenLoaiPhong`,`HoTen`, khachhang.CMND,khachhang.SDT, chitietdatphong.`MaPhong` as Phong, 
                            NgayNhanPhong, NgayTraPhong, GiaLoaiPhong
                        FROM `chitietdatphong` 
                            JOIN phong ON chitietdatphong.MaPhong = phong.MaPhong
                            JOIN loaiphong ON phong.MaLoaiPhong = loaiphong.MaLoaiPhong
                            JOIN khachhang ON chitietdatphong.MaKH = khachhang.MaKH
                            JOIN nhanvien ON chitietdatphong.MaNV = nhanvien.MaNV
                        WHERE `MaDP` = '$MaDP'";
        $result02 = mysqli_query($con, $query02) or die(mysqli_error($con));
        $row02 = mysqli_fetch_assoc($result02);


        ?>
        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 style="font-size: 30px; text-align: center;" class="m-0 font-weight-bolder text-primary">Xem
                            hóa đơn</h6>
                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid" id="HDBody">

                        <!--{{!-- <div class="content">
                            <div class="container-fluid"> --}}-->
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="content">
                                                <table class="table">
                                                    <!--dong 1-->
                                                    <div class="row">
                                                        <!--cot1-->
                                                        <div class="col-6">

                                                            <div class="row justify-content-between mt-4">
                                                                <div class="col-4">
                                                                    <label>Số phiếu đặt phòng: </label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label><?php echo $row02['MaDP']; ?></label>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Số hóa đơn: </label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label><?php echo $row01['MaHD']; ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Tình trạng hoá đơn:</label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label <?php if($row01['TrangThai'] == "Chờ thanh toán") echo 'style="color: red; font-weight: bold;"'; else echo 'style="color: lime; font-weight: bold;"'; ?>><?php echo $row01['TrangThai']; ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Ngày tạo: </label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label><?php echo $row01['NgayLap']; ?></label>
                                                                </div>
                                                            </div>
                                                            <!--Divider-->
                                                            <div class="dropdown-divider"></div>
                                                            <!--Divider-->
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Tên khách đặt: </label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label><?php echo $row02['HoTen']; ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Số điện thoại khách hàng: </label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label><?php echo $row02['SDT']; ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Ngày nhận: </label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label id="ngaynhan"><?php echo $row02['NgayNhanPhong']; ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Ngày trả:</label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label id="ngaytra"><?php echo $row02['NgayTraPhong']; ?></label>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            $date1 = new DateTime($row02['NgayNhanPhong']);
                                                            $date2 = new DateTime($row02['NgayTraPhong']);
                                                            $diff = $date1->diff($date2);
                                                            $SoDem = $diff->days;
                                                            $GiaTien += ($row02['GiaLoaiPhong'] * $SoDem);
                                                            ?>  
                                                            <div class="row justify-content-between">
                                                                <div class="col-4">
                                                                    <label>Số đêm ở:</label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label id="ngaytra"><?php echo $SoDem; ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </table>
                                                <div class="row">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Số phòng</th>
                                                                <th scope="col">Loại phòng</th>
                                                                <th scope="col">Giá phòng</th>
                                                                <th scope="col">Thành tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $row02['SoPhong']; ?></td>
                                                                <td><?php echo $row02['TenLoaiPhong']; ?></td>
                                                                <td id="room-price"><?php echo $row02['GiaLoaiPhong']; ?> / Đêm</td>
                                                                <td><?php echo $GiaTien ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <p style="font-size: 24px; text-align: left;">Dịch vụ</p>

                                                    <table class="table">
                                                        <input type="text" class="value" value="{{bill.quantity}}"
                                                            hidden />
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">STT</th>
                                                                <th scope="col">Tên dịch vụ</th>
                                                                <th scope="col">Đơn giá</th>
                                                                <th scope="col">Thành tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $query03 = "SELECT * FROM `chitietdatdichvu` JOIN `dichvu` ON chitietdatdichvu.MaDV = dichvu.MaDV WHERE MaDP = '$MaDP' AND NOT chitietdatdichvu.TrangThai = 'Cancel'";
                                                        $result03 = mysqli_query($con, $query03) or die(mysqli_error($con));
                                                        $stt = 1;
                                                        if(mysqli_num_rows($result03) == 0)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td colspan="4">Không có dịch vụ nào</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            while($row03 = mysqli_fetch_assoc($result03))
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $stt; ?></th>
                                                                    <td><?php echo $row03['TenDV']; ?></td>
                                                                    <td><?php echo $row03['GiaDV']; ?></td>
                                                                    <td>
                                                                        <span class="span product-total-price" value="0" data-price="<?php echo $row03['GiaDV']; ?>"><?php echo $row03['GiaDV']; ?> VNĐ
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $stt++;
                                                                $GiaTien += $row03['GiaDV'];
                                                            }
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tổng tiền</label>
                                                                    <input disabled name="total" type="text" id="total" class="form-control" value="<?php echo $GiaTien; ?> VNĐ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <br>
                                            </div><!-- End of content -->
                                        </div><!-- End of card -->
                                    </div><!-- End of col -->
                                </div><!-- End of row -->
                                <!--{{!--
                            </div> End of content-fluid --
                        </div> End of content -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-4">

                                <?php
                                    if($row01['TrangThai'] == "Chờ thanh toán")
                                    {
                                        ?>
                                        <button class="btn btn-info btn-fill" onclick="ThanhToan(<?php echo $MaHD; ?>)">THANH TOÁN</button>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <button onclick="XuatHoaDon()" class="btn btn-info btn-fill">XUẤT HÓA ĐƠN</button>
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="clearfix"></div>
                            <br>
                        </div>
                    </div>

                    <!--End content fluid begin-->
                </div>
                <!--End card shadow mb-4-->
            </div><!-- End of container-fluid -->
        </div><!-- End of Main Content -->
    </div><!-- End Content Wrapper -->
</div><!-- End wrapper -->


<script>
    function ThanhToan(bill_id) {
        $.post("../../xuly/xl_thanhtoan.php" , {MaHD: bill_id}, function(returndata) {
            alert("Thanh toán thành công");
            $("#HDBody").load(window.location.href + " #HDBody > *");
        })
    }
    function XuatHoaDon() {
        var font = "01010000 01101100 01100001 01101110 01110100 00100000 01110100 01110010 01100101 01100101 01110011";
        window.jsPDF = window.jspdf.jsPDF;
        var doc = new jsPDF();
        doc.setFont("test.ttf",font);
        var elementHTML = document.querySelector("#HDBody");
        doc.html(elementHTML,{
            callback: function(doc) {
                doc.save('HoaDon.pdf');
            },
            margin: [20, 20, 20, 20],
            autoPaging: 'text',
            x: 0,
            y: 0,
            width: 190, //target width in the PDF document
            windowWidth: 675,
        });
    }

    
</script>