<?php
    require '../connect/connect.php';
    $con = ketnoi();

    $SearchInput = mysqli_real_escape_string($con,$_POST['SearchInput']);
    $Key = mysqli_real_escape_string($con,$_POST['Key']);

    switch($Key)
    {
        case 'NV':
        {
            $query = "SELECT * FROM `taikhoan` WHERE MaNV LIKE '%{$SearchInput}%' OR TenNV LIKE '%{$SearchInput}%' ";
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
            break;
        }
        case 'Phong':
        {
            break;
        }
        case 'DV':
        {
            break;
        }
    }
?>