<?php
    $query = "SELECT * FROM `quyen`";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td><?php echo $row['MaQuyen']; ?></td>
            <td><?php echo $row['TenQuyen']; ?></td>
        </tr>
        <?php
    }
?>