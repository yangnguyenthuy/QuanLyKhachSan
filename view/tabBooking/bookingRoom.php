<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../style/js/search.js"></script>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                                <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Danh sách đặt
                                    phòng</h6>
                                <a href="../room/room.php">
                                    <button class="btn btn-info btn-fill pull-right">Đặt
                                            phòng</button>                                   
                                </a>
                            </div>
                        </div>
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-end">
                                <form>
                                    <div class="input-group">
                                        <input style="width:500px" type="text" name="q" class="form-control mr-6 w-10"
                                            placeholder="Search" onkeyup="Search(this.value,'DsDat')">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="tablezone" class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead id="headerzone">
                                        <tr>
                                            <th>Số phòng</th>
                                            <th>Ngày đặt phòng</th>
                                            <th>Loại phòng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>CMND</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                            <th>Huỷ</th>
                                        </tr>
                                    </thead>

                                    <tbody id="search-table">
                                        <?php require '../../xuly/xl_xem_datphong.php'; ?>
                                    </tbody>
                                </table>
                                <nav id="page_num">
                                    <ul class="pagination justify-content-end">
                                        <?php 
                                            if($page == 1)
                                            {
                                                ?>
                                                <li class="page-item disabled">
                                                    <a class="page-link">Previous</a>
                                                </li>
                                                <?php
                                            }
                                            else
                                            {                                            
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="./bookingRoom.php?page=<?php echo ($page - 1); ?>">Previous</a>
                                                </li>
                                                <?php
                                            }
                                        ?>

                                        <?php
                                            for($page_num = 1; $page_num <= $number_of_page; $page_num++)
                                            {
                                                ?>
                                                <li class="page-item <?php if($_GET['page'] == $page_num) echo "active"; else if(!isset ($_GET['page']) && $page_num == 1) echo "active"; ?>"><a class="page-link" href="./bookingRoom.php?page=<?php echo $page_num; ?>"><?php echo $page_num; ?></a></li>
                                                <?php
                                            }
                                        ?>

                                        <?php
                                            
                                            if($page == $number_of_page) 
                                            {
                                                ?>
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="./bookingRoom.php?page=<?php echo ($page + 1); ?>">Next</a>
                                                </li>
                                                <?php
                                            }
                                        ?>                                 
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>

        <script type="text/javascript">
            function Cancel(dp_id, room_id) {
                $.post("../../xuly/xl_huyphong.php", {MaDP: dp_id, MaPhong: room_id}, function(returndata){
                    if(returndata == 1)                  
                        $("#dataTable").load(window.location.href + " #dataTable > *");
                })
            }
        </script>
    </div>
</body>

</html>