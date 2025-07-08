<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h3>Danh sách danh mục</h3>
    <a href="create.php">Thêm danh mục</a>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th></th>
            <th></th>
        </tr>
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
            <tr>
                <td>
                    <?php echo $category['id']; ?>
                </td>
                <td>
                    <?php echo $category['name']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $category['id']; ?>">Sửa danh mục</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $category['id']; ?>">Xóa danh mục</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>