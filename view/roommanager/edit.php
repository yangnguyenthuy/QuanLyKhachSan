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

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Search -->
                <!--<form search
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>


                        <!-- Nav Item - User Information -->
                        <?php require '../Shared/user_bar.php'; ?>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa phòng</h6>
                    </div>
                    <?php
                        $MaPhong = $_GET['id'];
                        $query = "SELECT * FROM `phong` WHERE MaPhong = '$MaPhong'";
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
                                                <form method="POST" action="../../xuly/xl_sua_phong.php?id=<?php echo $MaPhong; ?>">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Số phòng</label>
                                                                <input type="text" class="form-control" name="SoPhong"
                                                                    placeholder="SP005" value="<?php echo $row['SoPhong']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Loại phòng</label>
                                                                <input type="text" class="form-control" name="LoaiPhong"
                                                                    placeholder="standard" value="<?php echo $row['LoaiPhong']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tên phòng</label>
                                                                <input type="text" class="form-control" name="TenPhong"
                                                                    placeholder="" value="<?php echo $row['TenPhong']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tiện ích Phòng</label>
                                                                <input type="text" class="form-control" name="TienIchPhong"
                                                                    placeholder="Có wifi, tivi, máy lạnh,..."
                                                                    value="<?php echo $row['TienIchPhong']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Số người tối đa</label>
                                                                <input type="text" class="form-control" name="SoNguoiToiDa"
                                                                    placeholder="2 người" value="<?php echo $row['SoNguoiToiDa']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Diện tích</label>
                                                                <input type="text" class="form-control" name="DienTich"
                                                                    placeholder="" value="<?php echo $row['DienTich']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Gía phòng</label>
                                                                <input type="text" class="form-control" name="GiaPhong"
                                                                    placeholder="400.000" value="<?php echo $row['GiaPhong']; ?>.000">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Giường</label>
                                                                <input type="text" class="form-control" name="Giuong"
                                                                    placeholder="" value="<?php echo $row['Giuong']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Mô tả phòng 1</label>
                                                                <input type="text" class="form-control"
                                                                    name="MoTa1" placeholder=""
                                                                    value="<?php echo $row['MoTa1']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Mô tả phòng 2</label>
                                                                <input type="text" class="form-control"
                                                                    name="MoTa2" placeholder=""
                                                                    value="<?php echo $row['MoTa2']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Hình ảnh phòng</label>
                                                                <input type="text" class="form-control" name="Hinh"
                                                                    placeholder="" value="<?php echo $row['Hinh']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <td><button type="submit" class="btn btn-info btn-fill"> Lưu chỉnh
                                                            sửa</button></td>
                                                    <div class="clearfix"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </br>

                            </div>
                        </div>

                        <!-- Footer -->
                        <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/datatables-demo.js"></script>
</body>
</html>