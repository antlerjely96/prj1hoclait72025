<?php
    //Lấy dữ liệu từ form
    $name = $_POST["name"];
    $image = $_FILES["image"]["name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $category_id = $_POST["category_id"];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO products(name, image, quantity, price, category_id) VALUES ('$name', '$image', '$quantity', '$price', '$category_id')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    if(!file_exists("../Images/" . $image)){
        $path = $_FILES["image"]["tmp_name"];
        move_uploaded_file($path, "../Images/" . $image);
    }
    //Quay về danh sách
    header("Location: index.php");
?>