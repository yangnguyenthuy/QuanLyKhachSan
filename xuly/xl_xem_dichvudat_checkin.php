<?php
    $MaDP = $_GET['id'];
    $query = "SELECT chitietdatdichvu.TrangThai as TrangThaiSuDung, chitietdatdichvu.MaDV, TenDV, GiaDV, MaCTDDV 
                FROM `chitietdatdichvu`
                JOIN dichvu ON chitietdatdichvu.MaDV = dichvu.MaDV
                WHERE `MaDP` = '$MaDP' AND NOT chitietdatdichvu.TrangThai = 'Cancel'";

    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if(mysqli_num_rows($result) == 0)
    {
        ?>
        <tr>
            <td colspan="5">Chưa đặt dịch vụ nào</td>
        </tr>
        <?php
    }
    else
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td><?php echo $row['MaDV']; ?></td>
                <td><?php echo $row['TenDV']; ?></td>
                <td><?php echo $row['GiaDV']; ?></td>
                <td>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--<button type="submit"
                                class="btn btn-info btn-fill">Check
                                In</button> -->
                            <a onclick="HuyDichVu(<?php echo $row['MaCTDDV']; ?>)" class="btn btn-info btn-fill">Hủy</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
    }
?>
