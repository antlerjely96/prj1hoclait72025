<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h3>Thêm sản phẩm</h3>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label for="name">Name: </label><input type="text" name="name" id="name"><br>
        Image: <input type="file" name="image"><br>
        <label for="quantity">Quantity: </label><input type="text" name="quantity" id="quantity"><br>
        <label for="price">Price: </label><input type="text" name="price" id="price"><br>
        <label for="category_id">Category: </label><select name="category_id" id="category_id">
            <?php
                //Mở kết nối db
                include_once "../Connection/open.php";
                //Viết sql lấy dữ liệu
                $sql = "SELECT * FROM categories";
                //Chạy sql
                $categories = mysqli_query($connection, $sql);
                //Đóng kết nối
                include_once "../Connection/close.php";
                //Hiển thị
                foreach ($categories as $category) {
            ?>
                <option value="<?php echo $category['id']; ?>">
                    <?php echo $category['name']; ?>
                </option>
            <?php
                }
            ?>

        </select><br>
        <button>Thêm</button>
    </form>
</body>
</html>