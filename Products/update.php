<?php
    //Lấy dữ liệu trong form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    if($image == ""){
        $sql = "UPDATE products SET name = '$name', quantity = '$quantity', price = '$price', category_id = '$category_id' WHERE id = '$id'";
    } else {
        $sql = "UPDATE products SET name = '$name', quantity = '$quantity', price = '$price', category_id = '$category_id', image = '$image' WHERE id = '$id'";
        if(!file_exists("../Images/" . $image)){
            $path = $_FILES["image"]["tmp_name"];
            move_uploaded_file($path, "../Images/" . $image);
        }
    }
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Quay lại danh sách
    header('location: index.php');
?>