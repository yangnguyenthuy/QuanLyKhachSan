<?php
    $query = "SELECT * FROM `datphong` WHERE NOT TrangThai = 'Cancel'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result))
    {
        $MaPhong = $row['MaPhong'];
        $query01 = "SELECT * FROM `phong` WHERE MaPhong = '$MaPhong'";
        $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
        $row01 = mysqli_fetch_assoc($result01);
        ?>
        <tr>
            <td><?php echo $row01['SoPhong']; ?></td>
            <th><?php echo $row01['LoaiPhong']; ?></th>
            <td><?php echo $row['HoTen']; ?></td>
            <td><?php echo $row['SDT']; ?></td>
            <td><?php echo $row['NgayNhanPhong']; ?></td>
            <td><?php echo $row['NgayTraPhong']; ?></td>
            <!--<td style="font-weight: bolder;"
                class="m-0 text-primary">
                Confirmed
            </td>-->
            <td>
                <div class="col-md-6">
                    <div class="form-group">
                        <!--<button type="submit"
                            class="btn btn-info btn-fill">Check
                            In</button> -->
                        <a onclick="CheckIn(<?php echo $row['MaDP']; ?>)" class="btn btn-info btn-fill">Check In</a>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
?>