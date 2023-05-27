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
                                <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Tạo dịch vụ</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../../xuly/xl_them_dv.php">
                                <div class="form-group">
                                    <label for="tendv">Tên dịch vụ</label>
                                    <input type="text" name="TenDV" class="form-control" id="tendv" placeholder="Nhập tên dịch vụ" required>
                                </div>
                                <div class="form-group">
                                    <label for="giadv">Giá dịch vụ</label>
                                    <input type="number" name="GiaDV" class="form-control" id="giadv" placeholder="Giá dịch vụ" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="MoTa" id="" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo dịch vụ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>