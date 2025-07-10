<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h3>Sửa sản phẩm</h3>
<form action="update.php" method="post" enctype="multipart/form-data">
    <?php
        //Lấy id của product đang được sửa
        $id = $_GET["id"];
        //Mở kết nối
        include_once "../Connection/open.php";
        //Viết sql
        $sql = "SELECT * FROM products WHERE id = '$id'";
        //Chạy sql
        $products = mysqli_query($connection, $sql);
        //Hiển thị
        foreach ($products as $product) {
    ?>
        <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
        <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $product['name']; ?>"><br>
        Image: <input type="file" name="image"><br>
        <label for="quantity">Quantity: </label><input type="text" name="quantity" id="quantity" value="<?php echo $product['quantity']; ?>"><br>
        <label for="price">Price: </label><input type="text" name="price" id="price" value="<?php echo $product['price']; ?>"><br>
        <label for="category_id">Category: </label><select name="category_id" id="category_id">
            <?php
            //Viết sql lấy dữ liệu
            $sql = "SELECT * FROM categories";
            //Chạy sql
            $categories = mysqli_query($connection, $sql);
            //Đóng kết nối
            include_once "../Connection/close.php";
            //Hiển thị
            foreach ($categories as $category) {
                ?>
                <option value="<?php echo $category['id']; ?>"
                    <?php
                        if($product['category_id'] == $category['id']){
                            echo "selected";
                        }
                    ?>
                >
                    <?php echo $category['name']; ?>
                </option>
                <?php
            }
            ?>
        </select><br>
    <?php
        }
    ?>
    <button>Sửa</button>
</form>
</body>
</html>