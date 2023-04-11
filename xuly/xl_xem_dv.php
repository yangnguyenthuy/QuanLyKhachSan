<?php
    $query = "SELECT * FROM `dichvu`";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $stt = 1;
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $stt; ?></td>
            <td><?php echo $row['MaDV']; ?></td>
            <td><?php echo $row['LoaiDV']; ?></td>
            <td><?php echo $row['TenDV']; ?></td>
            <td><?php echo $row['GiaDV']; ?></td>
            <td><?php echo $row['MoTa']; ?></td>
            <td><a href="./serviceView.php?id=<?php echo $row['MaDV']; ?>">
                    <button type="submit" class="btn btn-info btn-fill">Chi tiết</button>
            </td>
            <td><a><button class="btn btn-info btn-fill pull-right" data-toggle="modal"
                        data-id="<?php echo $row['MaDV']; ?>"
                        data-target="#delete-service-modal">Xoá</button></a> </td>
        </tr>
        <?php
        $stt++;
    }
?>