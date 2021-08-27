<?php
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['usernameLogin'])) {
	 header('Location: Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="./public/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/section.css">
</head>
<body>
<?php require_once "./Views/page/header.php"?>
<?php require_once "./Views/page/CustomerView.php"?>
<?php require_once "./Views/page/footer.php"?>
</body>
</html>