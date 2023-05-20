<?php require '../Shared/head_after.php'; ?>
<?php require '../../xuly/Shared/connect_db_view_after.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<link rel="stylesheet" href="../../style/css/thongke.css">
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
            <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

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
            <div class="container-fluid">
                <div class="chart-container">
                    <div class="d-flex p-2 flex-wrap">
                        <div class="chart-item">
                            <div class="chart-item-container">
                                <div class="item-header">
                                    <div class="item-name">
                                        <p class="title">Xu hướng đặt phòng</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="item-body">
                                    <div class="chart-wrap">
                                        <div class="chart">
                                            <canvas id="graph1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="chart-item">
                            <div class="chart-item-container">
                                <div class="item-header">
                                    <div class="item-name">
                                        <p class="title">Xu hướng dịch vụ</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="item-body">
                                    <div class="chart-wrap">
                                        <div class="chart">
                                            <canvas id="graph2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="chart-item">
                            <div class="chart-item-container">
                                <div class="item-header">
                                    <div class="item-name">
                                        <p class="title">Thống kê loại phòng</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="item-body">
                                    <div class="chart-wrap">
                                        <div class="chart">
                                            <canvas id="graph3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="chart-item">
                            <div class="chart-item-container">
                                <div class="item-header">
                                    <div class="item-name">
                                        <p class="title">Số phòng đang dừng hoạt động</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="item-body">
                                    <div class="chart-wrap">
                                        <div class="chart">
                                            <canvas id="graph4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="chart-item">
                            <div class="chart-item-container">
                                <div class="item-header">
                                    <div class="item-name">
                                        <p class="title">Số nhân viên từng bộ phận</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="item-body">
                                    <div class="chart-wrap">
                                        <div class="chart">
                                            <canvas id="graph5"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="chart-item">
                            <div class="chart-item-container">
                                <div class="item-header">
                                    <div class="item-name">
                                        <p class="title">Thống kê phòng</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="item-body">
                                    <div class="chart-wrap">
                                        <div class="chart">
                                            <canvas id="graph6"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <!--<canvas id="graph"></canvas>-->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
</div>
</body>
<!-- End of Page Wrapper -->
<script>
    $(document).ready(function() {
        showGraph(1);
        showGraph(2);
        showGraph(3);
        showGraph(4);
        showGraph(5);
        showGraph(6);
    })

    function showGraph(num) {
        $.post("../../xuly/xl_thongke.php", {id: num},
            function(data) {
                var dataJson = JSON.parse(data);
                var labels = [];
                var result = [];
                
                if(num == 1)
                {
                    for (var i in dataJson) 
                    {
                        labels.push(dataJson[i].TenLoaiPhong);
                        result.push(dataJson[i].SoLoaiPhong);
                    }
                }
                else if(num == 2)
                {
                    for (var i in dataJson) 
                    {
                        labels.push(dataJson[i].TenDV);
                        result.push(dataJson[i].SoLuongDV);
                    }
                }
                else if(num == 3)
                {
                    for (var i in dataJson) 
                    {
                        labels.push(dataJson[i].TenLoaiPhong);
                        result.push(dataJson[i].SoLuongPhong);
                    }
                }
                else if(num == 4)
                {
                    for (var i in dataJson) 
                    {
                        labels.push(dataJson[i].TenLoaiPhong);
                        result.push(dataJson[i].SoLuongPhong);
                    }
                }
                else if(num == 5)
                {
                    for (var i in dataJson) 
                    {
                        labels.push(dataJson[i].TenQuyen);
                        result.push(dataJson[i].SoTaiKhoan);
                    }
                }

                else if(num == 6)
                {
                    for (var i in dataJson) 
                    {
                        var label;
                        if(dataJson[i].TrangThai == "Enable")
                        {
                            label = "Hoạt động";
                        }
                        else if(dataJson[i].TrangThai == "Disable")
                        {
                            label = "Nghỉ việc";
                        }
                        labels.push(label);
                        result.push(dataJson[i].SoHoatDong);
                    }
                }

                var name = "#graph" + num;
                var pie = $(name);

                var myChart = new Chart(pie, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: result,
                            borderColor: ["rgba(217, 83, 79,1)", "rgba(240, 173, 78, 1)", "rgba(92, 184, 92, 1)","lime","red"],
                            backgroundColor: ["rgba(217, 83, 79,0.2)", "rgba(240, 173, 78, 0.2)", "rgba(92, 184, 92, 0.2)","lime","red"],
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                        },
                    }
                });
            });
    }
</script>