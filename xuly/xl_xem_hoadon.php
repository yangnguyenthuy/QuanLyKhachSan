<?php
    $query = "SELECT * FROM `hoadon`";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $row['SoHD']; ?></td>
            <td><?php echo $row['NgayLap']; ?></td>
            <td><?php echo $row['TongTriGia']; ?></td>
            <td><a href="../Bill/xemHoaDon.php?id=<?php echo $row['MaHD']; ?>">
                    <button type="submit" class="btn btn-info btn-fill pull-right">Xem
                    </button></td>
        </tr>
        <?php
    }
?>