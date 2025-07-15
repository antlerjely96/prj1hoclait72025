<?php
    session_start();
    //Xóa id, email trên session
    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_email']);
    //Quay lại login
    header("Location: index.php");
?>