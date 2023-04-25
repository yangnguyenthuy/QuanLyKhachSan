<?php
    $query = "SELECT * FROM `dichvu`";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $stt = 1;
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $row['MaDV']; ?></td>
            <td><?php echo $row['LoaiDV']; ?></td>
            <td><?php echo $row['TenDV']; ?></td>
            <td><?php echo $row['GiaDV']; ?></td>
            <td>
                <div class="col-md-6">
                    <div class="form-group">
                        <!--<button type="submit"
                            class="btn btn-info btn-fill">Check
                            In</button> -->
                        <a onclick="DatDichVu(<?php echo $MaHoaDon; ?>,'<?php echo $row['MaDV']; ?>')" class="btn btn-info btn-fill">Đặt</a>
                    </div>
                </div>
            </td>
        </tr>
        <?php
        $stt++;
    }
?>