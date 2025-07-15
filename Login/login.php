<?php
    session_start();
    //Lấy dữ liệu trong form
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Mở kết nối
    include_once '../Connection/open.php';
    //Viết sql
    $sql = "SELECT *, COUNT(id) AS count_id FROM customers WHERE email = '$email' AND password = '$password'";
    //Chạy sql
    $accounts = mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once '../Connection/close.php';
    //Kiểm tra xem email, pwd có tồn tại không
    foreach ($accounts as $account) {
        if($account['count_id'] == 0) {
            //Quay lại trang đăng nhập
            header("Location: index.php");
        } else {
            //Lưu id, email lên session
            $_SESSION['customer_id'] = $account['id'];
            $_SESSION['customer_email'] = $account['email'];
            //Quay về danh sách category
            header("Location: ../Categories/index.php");
        }
    }
?>