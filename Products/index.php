<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h3>Danh sách sản phẩm</h3>
    <a href="create.php">Thêm sản phẩm</a>
    <table cellspacing="0" cellpadding="0" border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Category</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            //Mở kết nối đến DB
            include_once "../Connection/open.php";
            //Viết sql
            $sql = "SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON products.category_id = categories.id";
            //Chạy sql
            $products = mysqli_query($connection, $sql);
            //Đóng kết nối
            include_once "../Connection/close.php";
            //Hiển thị dữ liệu
            foreach ($products as $product) {
        ?>
            <tr>
                <td>
                    <?php echo $product["id"]; ?>
                </td>
                <td>
                    <?php echo $product["name"]; ?>
                </td>
                <td>
                    <img src="../Images/<?php echo $product["image"]; ?>" width="100px" height="100px" alt="image">
                </td>
                <td>
                    <?php echo $product["quantity"]; ?>
                </td>
                <td>
                    <?php echo $product["price"]; ?>
                </td>
                <td>
                    <?php echo $product["category_name"]; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $product["id"]; ?>">Sửa sản phẩm</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $product["id"]; ?>">Xóa sản phẩm</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>