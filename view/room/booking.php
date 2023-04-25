<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <?php require '../Shared/sidebar.php'; ?>
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
            <!-- End of Topbar -->

            <?php
            $MaPhong = $_GET['id'];
            $query = "SELECT * FROM `phong` WHERE MaPhong = '$MaPhong'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($result);
            ?>
            <!-- Main Content -->
            <div id="content">
                <!-- Room Details Section Begin -->
                <section class="room-details-section spad">
                    <div class="container">
                        <div class="row">

                            <!--cot 1-->
                            <div class="col-8">
                                <div class="room-details-item" style="text-align:center;">
                                    <img src="../../style/img/room/<?php echo $row['Hinh']; ?>" alt="img_room">
                                </div>
                            </div>

                            <!--cot 2-->
                            <div class="col-4">
                                <div class="room-details-item">
                                    <div class="rd-text">
                                        <div class="rd-title">
                                            <h3 style="font-weight:bold;" id="tenphong"><?php echo $row['TenPhong']; ?></h3>
                                        </div>
                                        <h2 style="color:brown; margin: 0px auto;" class="room-price"><?php echo $row['GiaPhong']; ?><span>/NGÀY</span>
                                        </h2>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="r-o">Diện tích:</td>
                                                    <td><?php echo $row['DienTich']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Số người tối đa:</td>
                                                    <td><?php echo $row['SoNguoiToiDa']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Giường:</td>
                                                    <td><?php echo $row['Giuong']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Tiện ích phòng:</td>
                                                    <td><?php echo $row['TienIchPhong']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="review-add">
                                    <h4>Thông tin đặt phòng</h4>
                                    <form class="ra-form" method="POST" action="../../xuly/xl_datphong.php">
                                        <div class="row">
                                            <div>
                                                <input hidden type="text" name="MaPhong" readonly="true" value="<?php echo $row['MaPhong']; ?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="text" name="SoPhong" readonly="true" value="<?php echo $row['SoPhong']; ?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="text" name="LoaiPhong" readonly="true" value="<?php echo $row['LoaiPhong']; ?>">
                                            </div>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" placeholder="Họ và tên*" name="HoTen" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required />
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="text" placeholder="CMND*" name="CMND" required />
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="text" placeholder="Số điện thoại*" name="SDT" pattern="^(0[23456789][0-9]{8}|1[89]00[0-9]{4})$" required />
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" class="date-input" type="date" name="NgayNhanPhong" placeholder="Ngày nhận phòng*" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" class="date-input" type="date" name="NgayTraPhong" placeholder="Ngày trả phòng*" required>
                                            </div>
                                            <div class="col-lg-12">
                                                <a href="#">
                                                    <button type="submit" data-bs-target="#successful-modal" class="btn btn-info btn-fill pull-right" data-bs-toggle="modal">Đặt
                                                        phòng</button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- Room Details Section End -->
            </div>
            <!-- End of Main Content -->
        </div>
    </div>


    <!--confirm-->

</body>

</html>