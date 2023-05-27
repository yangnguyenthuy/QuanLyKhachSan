<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div>
                                <h6 style="font-weight: bolder; font-size:25px; text-align: center;" class="m-0 text-primary">Chỉnh sửa dịch vụ</h6>
                                <!-- Search section -->
                            </div>
                        </div>
                        <?php
                        $MaDV = $_GET['id'];
                        $query = "SELECT * FROM `dichvu` WHERE MaDV = '$MaDV'";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form method="POST" action="../../xuly/xl_sua_dv.php?id=<?php echo $MaDV; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên dịch vụ</label>
                                        <input type="text" class="form-control" name="TenDV" placeholder="" value="<?php echo $row['TenDV']; ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giá dịch vụ</label>
                                        <input type="text" class="form-control" name="GiaDV" value="<?php echo $row['GiaDV']; ?>" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả</label>
                                        <textarea type="text" class="form-control" name="MoTa" rows="8" ><?php echo $row['MoTa']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <td><button type="submit" class="btn btn-info btn-fill" href="../TabService/editServiceTab.php?id=<?php echo $MaDV; ?>"> Chỉnh
                                    sửa</button></td>
                            <div class="clearfix"></div>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

</body>

</html>