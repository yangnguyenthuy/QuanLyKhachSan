<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                <form action="/bookingRoom/searchName">
                                    <div class="input-group">
                                        <input style="width:700px" type="text" name="q" class="form-control mr-6 w-10" placeholder="Search">
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
                                            <th>Loại phòng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>CMND</th>
                                            <th>Ngày nhận phòng</th>
                                            <th>Ngày Trả phòng</th>
                                            <th>Xác nhận</th>
                                            <th>Huỷ</th>
                                        </tr>
                                    </thead>

                                    <tbody id="datazone">
                                        <?php require '../../xuly/xl_xem_datphong.php'; ?>
                                    </tbody>
                                </table>
                                <a href="../room/room.php">
                                    <button class="btn btn-info btn-fill pull-right">Đặt
                                            phòng</button>                                   
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>

        <!--confirm-->
        <div id="delete-cusomter-modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xoá khách hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xoá khách hàng này !!! </p>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-delete-customer" type="button" class="btn btn-danger">Xoá bỏ</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    </div>
                </div>
            </div>
        </div>

        <!--form delete course -->
        <form method="POST" name="delete-customer-form"></form>

        <!--Script callback function to delete-->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                var customerId;
                var deleteForm = document.forms['delete-customer-form'];
                var btnDeleteCustomer = document.getElementById('btn-delete-customer');

                //when dialog confirm click
                $('#delete-cusomter-modal').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget) // Button that triggered the modal
                    customerId = button.data('id') // Extract info from data-* attributes
                });

                btnDeleteCustomer.onclick = function() {
                    deleteForm.action = `/bookingRoom/${customerId}?_method=DELETE`;
                    deleteForm.submit();
                }
            });
        </script>
        <script type="text/javascript">
            function Confirm(dp_id, room_id) {
                $.post("../../xuly/xl_confirm_datphong.php", {MaDP: dp_id, MaPhong: room_id}, function(returndata){
                    if(returndata == 1)                   
                        $("#dataTable").load(window.location.href + " #dataTable > *");
                })
            }
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