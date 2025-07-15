<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['customer_email'])){
            header("Location: ../Categories/index.php");
        }
    ?>
    <h3>Đăng nhập</h3>
    <form action="login.php" method="post">
        <label for="email">Email: </label> <input type="email" name="email" id="email"><br>
        <label for="password">Password: </label><input type="password" name="password" id="password"><br>
        <button>Đăng nhập</button>
    </form>
</body>
</html>