<?php
    require '../../xuly/Shared/connect_db_view_after.php';
    session_unset();
    session_destroy();
?>
<script>
    alert('Đăng xuất thành công');
    document.location = "../../index.php";
</script>