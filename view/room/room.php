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
            <div id="content">
                <!-- Breadcrumb Section Begin -->
                <div class="breadcrumb-section" style="padding-top: 0; padding-bottom:0;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-16">
                                <div class="breadcrumb-text">
                                    <h2 style="font-size: 50px">Các phòng của chúng tôi</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb Section End -->
                <!-- Search section -->
                <div class="container">
                    <form action="/room/searchR">
                        <div class="input-group mb-3">
                            <input type="text" name="q" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Rooms Section Begin -->
                <section class="rooms-section spad">
                    <div class="container">
                        <div class="row">
                            <?php
                            $query = "SELECT * FROM `phong` WHERE TrangThai = 'Empty'";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="room-item">
                                        <img src="../../style/img/room/<?php echo $row['Hinh']; ?>" alt="">
                                        <div class="ri-text">
                                            <h4><?php echo $row['TenPhong']; ?></h4>
                                            <h3 class="room-price"><?php echo $row['GiaPhong']; ?><span>/NGÀY</span>
                                            </h3>
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
                                            <a href="./showSlug.php?id=<?php echo $row['MaPhong']; ?>" class="primary-btn">Đặt Ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Rooms Section End -->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>

            </div>
            <!-- End of Main Content -->
        </div>
    </div>
</body>

</html>