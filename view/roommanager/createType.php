<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>

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

            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                                <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Tạo loại phòng</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../../xuly/xl_them_loaiphong.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="ten">Tên loại phòng</label>
                                    <input type="text" name="TenLoaiPhong" class="form-control" id="ten" placeholder="Nhập tên loại phòng" required>
                                </div>
                                <div class="form-group">
                                    <label for="gia">Giá loại phòng</label>
                                    <input type="number" name="GiaLoaiPhong" class="form-control" id="gia" min="1" value="1" required>
                                </div>
                                <div class="form-group">
                                    <label for="hinh">Hình</label>
                                    <input type="file" name="Hinh" class="form-control" id="gia" required>
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <textarea class="form-control" name="MoTaLoaiPhong" id="" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>