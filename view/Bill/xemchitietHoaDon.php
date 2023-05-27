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

            <?php
            $MaCheckIn = $_GET['id'];
            $query = "SELECT * FROM `checkin` WHERE MaCheckIn = '$MaCheckIn'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($result);
            $MaHD = $row['MaHD'];
            $query01 = "SELECT * FROM `hoadon` WHERE MaHD = '$MaHD'";
            $result01 = mysqli_query($con, $query01) or die(mysqli_error($con));
            $row01 = mysqli_fetch_assoc($result01);
            $MaPhong = $row['MaPhong'];
            ?>
            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="font-size: 30px; text-align: center;" class="m-0 font-weight-bolder text-primary">Xem
                                hóa đơn chi tiết</h6>
                        </div>

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!--{{!-- <div class="content">
                            <div class="container-fluid"> --}}-->
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="content">
                                            <table class="table">
                                                <!--dong 1-->
                                                <div class="row">
                                                    <!--cot1-->
                                                    <div class="col-6">

                                                        <div class="row justify-content-between mt-4">
                                                            <div class="col-4">
                                                                <label>Số phiếu Check In - Out: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label><?php echo $row['MaCheckIn']; ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Số hóa đơn: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" name="billID" value="{{bill._id}}" hidden />
                                                                <label><?php echo $row01['SoHD']; ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Tình trạng hoá đơn:</label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label><?php echo $row01['TrangThai']; ?></label>
                                                                <!--<label>Đã thanh toán</label>-->
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Ngày tạo: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label><?php echo $row01['NgayLap']; ?></label>
                                                            </div>
                                                        </div>
                                                        <!--Divider-->
                                                        <div class="dropdown-divider"></div>
                                                        <!--Divider-->
                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Tên khách hàng: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label><?php echo $row['HoTenKH']; ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Số điện thoại khách hàng: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label><?php echo $row['SDT']; ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Ngày nhận phòng: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label id="ngaynhan"><?php echo $row['NgayCheckIn']; ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-4">
                                                                <label>Ngày trả phòng: </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label id="ngaytra"><?php echo $row['NgayCheckOut']; ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </table>
                                            <?php
                                            $query02 = "SELECT * FROM `phong` WHERE MaPhong = '$MaPhong'";
                                            $result02 = mysqli_query($con, $query02) or die(mysqli_error($con));
                                            $row02 = mysqli_fetch_assoc($result02);
                                            ?>
                                            <div class="row">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Số phòng</th>
                                                            <th scope="col">Loại phòng</th>
                                                            <th scope="col">Giá phòng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row02['SoPhong']; ?></td>
                                                            <td><?php echo $row02['LoaiPhong']; ?></td>
                                                            <td id="room-price"><?php echo $row02['GiaPhong']; ?> VNĐ</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p style="font-size: 24px; text-align: left;">Dịch vụ</p>
                                            <form method="POST" action="/bill/:id/store?_method=PUT">

                                                <table class="table">

                                                    <input type="text" class="value" value="{{bill.quantity}}" hidden />
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Tên dịch vụ</th>
                                                            <th scope="col">Đơn giá</th>
                                                            <th scope="col">Thành tiền</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query03 = "SELECT * FROM `datdichvu` WHERE MaHD = '$MaHD'";
                                                        $result03 = mysqli_query($con, $query03) or die(mysqli_error($con));
                                                        $stt = 1;
                                                        while($row03 = mysqli_fetch_assoc($result03))
                                                        {
                                                            $MaDV = $row03['MaDV'];
                                                            $query04 = "SELECT * FROM `dichvu` WHERE MaDV = '$MaDV'";
                                                            $result04 = mysqli_query($con, $query04) or die(mysqli_error($con));
                                                            $row04 = mysqli_fetch_assoc($result04);
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $stt; ?></th>
                                                                <td><?php echo $row04['TenDV']; ?></td>
                                                                <td><?php echo $row04['GiaDV']; ?></td>
                                                                <td>
                                                                    <span class="span product-total-price" value="0" data-price="<?php echo $row04['GiaDV']; ?>"><?php echo $row04['GiaDV']; ?> VNĐ
                                                                    </span>
                                                                    <input hidden name="totalPD" type="text" class="form-control" value="0">
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $stt++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tổng tiền</label>
                                                                <input disabled name="total" type="text" id="total" class="form-control" value="<?php echo $row01['TongTriGia']; ?> VNĐ">
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- End of content -->
                                    </div><!-- End of card -->
                                </div><!-- End of col -->
                            </div><!-- End of row -->
                            <!--{{!--
                            </div> End of content-fluid
                        </div> End of content -->
                        </div>
                        <!--End content fluid begin-->
                    </div>
                    <!--End card shadow mb-4-->
                </div><!-- End of container-fluid -->
            </div><!-- End of Main Content -->
        </div><!-- End Content Wrapper -->
    </div><!-- End wrapper -->
</body>



<!--{{!-- Bill Operator --}}-->
<script>
    var values = document.querySelector('.value');
    var string = values.value;
    var valueArr = string.split(',');
    //valueArr.forEach(i => console.log(i))

    console.log(valueArr[0]);
    console.log(valueArr[1]);
    console.log(valueArr[2]);
    console.log(valueArr[3]);
    var position = 0;

    var qty = document.querySelectorAll('.qty').forEach(item => {

        if (valueArr[position] == null || valueArr[position] == '') {
            valueArr[position] = 0;
        }
        item.value = valueArr[position];

        position++;
        //console.log(item.value);
        productTotal();
        Total();
    })

    //Increment
    var increment = document.querySelectorAll('.qtyplus').forEach(item => {
        item.addEventListener('click', event => {
            var clicked = event.target;
            var input = clicked.parentElement.children[1];
            var inputValue = input.value;
            var value = inputValue;
            value++;
            input.value = value;
            productTotal();
            Total();
        })
    })

    //Decrement
    var decrement = document.querySelectorAll('.qtyminus').forEach(item => {
        item.addEventListener('click', event => {
            var clicked = event.target;
            var input = clicked.parentElement.children[1];
            var inputValue = input.value;
            var value = inputValue;
            value--;
            if (value >= 0) {
                input.value = value;
            } else {
                input.value = 0;
            }

            productTotal();
            Total();
        })
    })

    function productTotal() {
        var productTT = document.querySelectorAll('.product-total-price').forEach(item => {

            var quantity = item.parentElement.parentElement.children[3].children[0].value;

            var total = 0;
            var productPrice = item.dataset.price.replaceAll(',', '');
            //console.log(productPrice);
            total = total + (productPrice * quantity);
            //console.log(total);
            var input = item.parentElement.children[1];
            input.value = new Intl.NumberFormat().format(total);

            item.innerHTML = new Intl.NumberFormat().format(total) + " VNĐ";
            //console.log(item.innerHTML);
        })
    }

    function Total() {

        var roomPrice = document.getElementById('room-price').innerText;
        var ngayNhanID = document.getElementById('ngaynhan').innerText;
        var ngayTraID = document.getElementById('ngaytra').innerText;

        var ngayNhan = ngayNhanID;
        var ngayTra = ngayTraID;

        var ngaynhanArr = ngayNhan.split('-');
        var ngaytraArr = ngayTra.split('-');
        var ngayO = parseFloat(ngaytraArr[2] - ngaynhanArr[2]);

        var giaphong = parseFloat(roomPrice.replaceAll(',', ''));
        var sum = giaphong * ngayO;


        var totalPD = document.querySelectorAll('.product-total-price').forEach(item => {
            var text = item.innerText.replaceAll(',', '');
            //console.log(text);
            var sumPD = parseFloat(text);
            sum = sum + sumPD;
            //console.log(sum);
            var total = document.getElementById('total');
            total.value = new Intl.NumberFormat().format(sum) + " VNĐ";
            //console.log(total.value);
        })
    }
</script>

</html>