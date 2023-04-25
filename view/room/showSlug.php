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

            <!-- Main Content -->
            <?php
            $MaPhong = $_GET['id'];
            $query = "SELECT * FROM `phong` WHERE MaPhong = '$MaPhong'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($result);
            ?>
            <div id="content">
                <!-- Breadcrumb Section Begin -->
                <div class="breadcrumb-section" style="padding-top: 0; padding-bottom:0;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="breadcrumb-text">
                                    <h2><?php echo $row['TenPhong']; ?> của chúng tôi</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb Section End -->
                <!-- Room Details Section Begin -->
                <section class="room-details-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="room-details-item">
                                    <!--<div class="row justify-content-center"></div>-->
                                    <img style="display: flex; width: 50%; margin: 0 auto 40px;" src="../../style/img/room/<?php echo $row['Hinh']; ?>" alt="room">
                                    <!-- <img style="width: 100%;" src="/img/room/room-details.jpg" alt="room"> -->
                                    <div class="rd-text">
                                        <div class="rd-title">
                                            <h3 id="tenphong"><?php echo $row['TenPhong']; ?></h3>
                                            <div class="rdt-right">
                                                <div class="rating">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star-half_alt"></i>
                                                </div>
                                                <!-- <a href="#">Chọn phòng</a> -->
                                                <a href="./booking.php?id=<?php echo $MaPhong; ?>" onclick="getInfoRoom">Đặt phòng ngay</a>
                                            </div>
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
                                        <p class="f-para"><?php echo $row['MoTa1']; ?></p>
                                        <p><?php echo $row['MoTa2']; ?></p>
                                    </div>
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




</body>

</html>