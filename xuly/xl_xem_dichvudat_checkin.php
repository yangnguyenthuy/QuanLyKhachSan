<?php
    $query = "SELECT * FROM `datdichvu` WHERE MaHD = '$MaHoaDon'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while ($row = mysqli_fetch_assoc($result))
    {
        $MaDV = $row['MaDV'];
        $query01 = "SELECT * FROM `dichvu` WHERE MaDV = '$MaDV'";
        $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
        $row01 = mysqli_fetch_assoc($result01);

        ?>
        <tr>
            <td><?php echo $row01['MaDV']; ?></td>
            <td><?php echo $row01['LoaiDV']; ?></td>
            <td><?php echo $row01['TenDV']; ?></td>
            <td><?php echo $row01['GiaDV']; ?></td>
            <td>
                <div class="col-md-6">
                    <div class="form-group">
                        <!--<button type="submit"
                            class="btn btn-info btn-fill">Check
                            In</button> -->
                        <a onclick="HuyDichVu(<?php echo $row['MaDatDV']; ?>,<?php echo $MaHoaDon; ?>,'<?php echo $row['MaDV']; ?>')" class="btn btn-info btn-fill">Hủy</a>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
?>
