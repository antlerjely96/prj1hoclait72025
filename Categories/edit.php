<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h3>Sửa danh mục</h3>
<form method="post" action="update.php">
    <?php
        //Lấy id của bản ghi đang cần sửa
        $id = $_GET['id'];
        //Mở kết nối
        include_once '../Connection/open.php';
        //Viết sql
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        //Chạy sql
        $categories = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once '../Connection/close.php';
        //Hiển thị
        foreach ($categories as $category) {
    ?>
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
        <label for="name">Tên danh mục</label><input type="text" id="name" name="name" value="<?php echo $category['name']; ?>"><br>
    <?php
        }
    ?>
    <button>Sửa</button>
</form>
</body>
</html>