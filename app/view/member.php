<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/general.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/member.css">
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/c2.jpg">
    <title>Trang chủ</title>
</head>
<body>
    <?php
    require 'include/navbar.php';
    require 'member/get-list.php';
    require 'include/footer.html';
    ?>
    <script src="<?php echo URLROOT; ?>/public/js/main.js"></script>
</body>
</html>