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
                        <div class="d-flex justify-content-between">
                            <h6 style="font-weight: bolder; font-size:25px;" class="m-0 text-primary">Danh sách quyền
                            </h6>
                            <!-- Search section -->
                            <form action="/???????">
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
                                        <th>Mã quyền</th>
                                        <th>Tên quyền</th>
                                    </tr>
                                </thead>

                                <tbody>                                    
                                    <?php require '../../xuly/xl_xem_quyen.php'; ?>

                                </tbody>
                            </table>
                            <!--<a href="./createRole.php">
                                <td><button class="btn btn-info btn-fill pull-right">Thêm
                                        quyền</button>
                                </td>
                            </a>-->
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 style="font-weight: bolder; font-size:20px;" class="m-0 text-primary">Tạo dịch vụ mới
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã quyền</th>
                                        <th>Tên quyền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!--Form store database-->
                                        <form method="POST" action="../../xuly/xl_them_quyen.php">
                                            <td><input type="text" name="MaQuyen" class="form-control"
                                                    placeholder="Nhập mã dịch vụ" required></td>
                                            <td><input type="text" name="TenQuyen" class="form-control"
                                                    placeholder="Nhập loại dịch vụ" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <td><button type="submit" class="btn btn-info btn-fill">Thêm Quyền</button></td>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

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
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<div id="delete-roommanager-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xóa phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa phòng?</p>
            </div>
            <div class="modal-footer">
                <button id="btn-delete-roommanager" type="button" class="btn btn-danger">Xóa bỏ</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

<form name="delete-roommanager-form" method="POST"></form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var roommanagerId;
        var deleteForm = document.forms['delete-roommanager-form'];
        var btnDeleteRoommanager = document.getElementById('btn-delete-roommanager');

        //Khi dialog confirm clicked
        $('#delete-roommanager-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            roommanagerId = button.data('id');
        });

        btnDeleteRoommanager.onclick = function () {
            deleteForm.action = '../../xuly/delete_item.php?id=' + roommanagerId + '&place=ROOM';
            deleteForm.submit();
        }
    });
</script>
</body>
</html>