<?php
    $query = "SELECT * FROM `taikhoan`";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $row['MaNV']; ?></td>
            <td><?php echo $row['TenNV']; ?></td>
            <td><?php echo $row['SDT']; ?></td>
            <td><?php echo $row['TaiKhoan']; ?></td>
            <td><?php echo $row['MatKhau']; ?></td>
            <td><?php echo $row['Role']; ?></td>
            <td><a href="./viewEmployee.php?id=<?php echo $row['MaTK']; ?>">
                    <button type="submit" class="btn btn-info btn-fill pull-right">Xem
                    </button></td>
            <td><a><button class="btn btn-info btn-fill pull-right" data-toggle="modal"
                        data-id="<?php echo $row['MaTK']; ?>"
                        data-target="#delete-employee-modal">Xoá</button></a> </td>


        </tr>
        <?php
    }
?>