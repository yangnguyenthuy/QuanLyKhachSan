<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
    
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
                        <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Chỉnh sửa nhân
                            viên
                        </h6>
                    </div>
                    <?php
                        $MaTK = $_GET['id'];
                        $query = "SELECT * FROM `taikhoan` WHERE MaTK = '$MaTK'";
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
                                                <form method="POST" action="../../xuly/xl_sua_nv.php?id=<?php echo $MaTK; ?>">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mã nhân viên</label>
                                                                <input type="text" class="form-control" name="MaNV"
                                                                    id="maNV" placeholder="maNV" value="<?php echo $row['MaNV']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tên nhân viên</label>
                                                                <input type="text" class="form-control" name="TenNV"
                                                                    id="name" placeholder="name" value="<?php echo $row['TenNV']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Chứng minh nhân dân</label>
                                                                <input type="text" class="form-control" name="CMND"
                                                                    id="cmnd" placeholder="cmnd" value="<?php echo $row['CMND']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="text" class="form-control" name="SDT"
                                                                    id="phone" placeholder="phone"
                                                                    value="<?php echo $row['SDT']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" class="form-control" name="Email"
                                                                    id="email" placeholder="email"
                                                                    value="<?php echo $row['Email']; ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tên tài khoản</label>
                                                                <input type="text" class="form-control" name="TaiKhoan"
                                                                    id="username" placeholder="username"
                                                                    value="<?php echo $row['TaiKhoan']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Mật khẩu</label>
                                                                <input type="text" class="form-control" name="MatKhau"
                                                                    id="password" placeholder="password"
                                                                    value="<?php echo $row['MatKhau']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Chức vụ</label>
                                                                <input type="text" class="form-control" name="Role"
                                                                    id="role" placeholder="role" value="<?php echo $row['Role']; ?>">
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
</body>
</html>