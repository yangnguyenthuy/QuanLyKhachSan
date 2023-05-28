<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../style/js/search.js"></script>
<style>
    .hedding {
    font-size: 20px;
    color: #ab8181;
    }

    .main-section {
        position: absolute;
        left: 50%;
        right: 50%;
        transform: translate(-50%, 5%);
    }

    .left-side-product-box img {
        width: 100%;
    }

    .left-side-product-box .sub-img img {
        margin-top: 5px;
        width: 83px;
        height: 100px;
    }

    .right-side-pro-detail span {
        font-size: 15px;
    }

    .right-side-pro-detail p {
        font-size: 25px;
        color: #a1a1a1;
    }

    .right-side-pro-detail .price-pro {
        color: #E45641;
    }

    .right-side-pro-detail .tag-section {
        font-size: 18px;
        color: #5D4C46;
    }

    .pro-box-section .pro-box img {
        width: 100%;
        height: 200px;
    }

    @media (min-width:360px) and (max-width:640px) {
        .pro-box-section .pro-box img {
            height: auto;
        }
    }
</style>
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

            <?php
                $MaLoaiPhong = $_GET['id'];
                $query = "SELECT * FROM `loaiphong` WHERE `MaLoaiPhong` = '$MaLoaiPhong'";
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($result);
            ?>

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                                <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Chi tiết loại phòng</h6>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row m-0">
                                <div class="col-lg-4 left-side-product-box pb-3">
                                    <img id="view-img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Hinh']); ?>" class="border p-3">
                                    <p style="padding-top: 5px;" class="text-center">Ảnh minh họa</p>
                                </div>
                                <div class="col-lg-8">
                                    <div class="right-side-pro-detail border p-3 m-0">
                                        <div class="row">
                                            <div class="col-lg-12 pt-2">
                                                <p class="m-0 p-0"><strong><?php echo $row['TenLoaiPhong']; ?></strong></p>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <hr class="p-0 m-0">
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h5>Mã Loại Phòng : <span style="font-size:17px;"> <?php echo $row['MaLoaiPhong']; ?> </span></h6>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h5>Giá Loại Phòng : <span style="font-size:17px;"> <?php echo $row['GiaLoaiPhong']; ?> </span></h6>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h5>Mô tả loại phòng: </h5>
                                                <span style="color:black;"><?php echo $row['MoTaLoaiPhong']; ?></span>
                                            </div>
                                            <?php
                                                if($_SESSION['TenQuyen'] == "Admin" || $_SESSION['TenQuyen'] == "Phòng Kinh Doanh")
                                                {
                                                    ?>
                                                    <div class="col-lg-12 mt-3">
                                                        <div class="row">
                                                            <div class="col-lg-6 pb-2">
                                                                <a href="../roommanager/editType.php?id=<?php echo $MaLoaiPhong; ?>" class="btn btn-danger w-100">Sửa Thông Tin</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>