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
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <div class="d-flex justify-content-between">
                            <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Danh sách dịch vụ
                            </h6>
                            <!-- Search section -->
                            <form action="">
                                <div class="input-group">
                                    <input style="width:700px" type="text" name="q" class="form-control mr-6 w-10"
                                        placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã dịch vụ</th>
                                        <th>Loại dịch vụ</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Giá dịch vụ</th>
                                        <th>Mô tả</th>
                                        <th>Chỉnh sửa dịch vụ</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php require '../../xuly/xl_xem_dv.php'; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 style="font-weight: bolder; font-size:20px;" class="m-0 text-primary">Tạo dịch vụ mới
                            </h6>
                            <!-- Search section -->
                            <!-- <form action="/???????">
                                <div class="input-group">
                                    <input style="width:700px" type="text" name="q" class="form-control mr-6 w-10"
                                        placeholder="Search">
                                </div>
                            </form> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã dịch vụ</th>
                                        <th>Loại dịch vụ</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Giá dịch vụ</th>
                                        <th>Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!--Form store database-->
                                        <form method="POST" action="../../xuly/xl_them_dv.php">
                                            <td><input type="text" name="MaDV" class="form-control"
                                                    placeholder="Nhập mã dịch vụ" required></td>
                                            <td><input type="text" name="LoaiDV" class="form-control"
                                                    placeholder="Nhập loại dịch vụ" required></td>
                                            <td><input type="text" name="TenDV" class="form-control"
                                                    placeholder="Nhập tên dịch vụ" required></td>
                                            <td><input type="text" name="GiaDV" class="form-control"
                                                    placeholder="Nhập giá dịch vụ" required></td>
                                            <td><input type="text" name="MoTa" class="form-control"
                                                    placeholder="Nhập mô tả dịch vụ" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <td><button type="submit" class="btn btn-info btn-fill">Tạo dịch vụ</button></td>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>



        <div id="delete-service-modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa dịch vụ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa dịch vụ này?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-delete-service" type="button" class="btn btn-danger">Xóa bỏ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>

                    </div>
                </div>
            </div>
        </div>

        <form name="delete-service-form" method="POST"></form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var serviceId;
                var deleteForm = document.forms['delete-service-form'];
                var btnDeleteService = document.getElementById('btn-delete-service');

                //Khi dialog confirm clicked
                $('#delete-service-modal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    serviceId = button.data('id');
                });

                btnDeleteService.onclick = function () {
                    deleteForm.action = '../../xuly/delete_item.php?id=' + serviceId + '&place=DV';
                    deleteForm.submit();
                }

            });
        </script>
</body>
</html>