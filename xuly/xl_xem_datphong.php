<?php
    $query = "SELECT * FROM `datphong`";
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
            <td><?php echo $row['CMND']; ?></td>
            <td><?php echo $row['NgayNhanPhong']; ?></td>
            <td><?php echo $row['NgayTraPhong']; ?></td>
            <td>
                <?php
                    if($row['TrangThai'] == "Wait")
                    {
                        ?> 
                        <a onclick="Confirm(<?php echo $row['MaDP']; ?>, <?php echo $MaPhong; ?>)">
                            <button type="submit" class="btn btn-info btn-fill">Confirm</button>
                        </a>
                        <?php
                    }
                    else if($row['TrangThai'] == "Confirm")
                    {
                        ?>
                        <button type="submit" class="btn btn-info btn-fill" disabled=true>Confirmed</button>
                        <?php
                    }
                    else
                    {
                        ?>
                        <button type="submit" class="btn btn-info btn-fill" disabled=true>Cancel</button>
                        <?php
                    }
                ?>
            </td>
            <td>
                <?php 
                    if($row['TrangThai'] != "Cancel")
                    {
                        ?>
                        <a onclick="Cancel(<?php echo $row['MaDP']; ?>, <?php echo $MaPhong; ?>)">
                            <button type="submit" class="btn btn-info btn-fill">Cancel</button>
                        </a>
                        <?php
                    }
                ?>
            </td>
        </tr>
        <?php
    }
?>