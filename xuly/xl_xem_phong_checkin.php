<?php
    $query = "SELECT * FROM `phong` WHERE NOT TrangThai = 'Disable'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $row['SoPhong']; ?></td>
            <td><?php echo $row['LoaiPhong']; ?></td>
            <td><?php echo $row['TienIchPhong']; ?></td>
            <td><?php echo $row['SoNguoiToiDa']; ?></td>
            <td><?php echo $row['GiaPhong']; ?></td>
            <td>
                <?php
                    if($row['TrangThai'] == "Occupied")
                    {
                        ?>
                        <div style="font-weight: bolder; color:red" class="">
                            Occupied
                        </div>
                        <?php
                    }
                    else if($row['TrangThai'] == "Empty")
                    {
                        ?>
                        <div style="font-weight: bolder; color:#43E03A" class="">
                            Empty
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div style="font-weight: bolder; color:red" class="">
                            Disable
                        </div>
                        <?php
                    }
                ?>
            </td>
        </tr>
        <?php
    }
?>