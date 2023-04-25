<?php
    $query = "SELECT * FROM `phong`";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $row['SoPhong']; ?></td>
            <td><?php echo $row['LoaiPhong']; ?></td>
            <td><?php echo $row['TenPhong']; ?></td>
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
            <td><a href="./view.php?id=<?php echo $row['MaPhong']; ?>">
                    <button type="submit" class="btn btn-info btn-fill pull-right">Xem
                    </button></td>
            <td><a><button class="btn btn-info btn-fill pull-right" data-toggle="modal"
                        data-id="<?php echo $row['MaPhong']; ?>"
                        data-target="#delete-roommanager-modal">Xoá</button></a> </td>
        </tr>
        <?php
    }
?>