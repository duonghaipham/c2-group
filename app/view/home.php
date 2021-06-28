<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/general.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/home.css">
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/c2.jpg">
    <title>Trang chủ</title>
</head>
<body>
    <?php
    require 'include/navbar.php';
    ?>
    <div id="content">
        <div id="tab">
            <button class="tab-link" id="btn-stream">Quá trình</button>
            <button class="tab-link" id="btn-work">Công việc</button>
        </div>
        <div class="tab-content" id="stream">
            <div id="stream-container">
                <?php
                require 'page/deadline.html';
                ?>
                <div id="feed">
                    <?php
                    require 'post/create.php';
                    require 'post/get-list.php';
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-content" id="work">
            <div id="work-container">
                <button type="button" id="btn-create-work"><i class="fa"></i>Tạo</button>
                <ul id="list-create">
                    <li><a href="<?php echo URLROOT; ?>/poll/create"><i class="fa" id="vote"></i>Bình chọn</a></li>
                    <li><a href="<?php echo URLROOT; ?>/material/create"><i class="fa" id="doc"></i>Tài liệu</a></li>
                </ul>
                <?php
                require 'work/get-list.php';
                ?>
            </div>
        </div>
    </div>
    <?php
    require 'include/footer.html';
    ?>
    <script>
        const urlComment = "<?php echo URLROOT . '/post/comment/'; ?>";
        const urlPoll = "<?php echo URLROOT . '/poll/make/'; ?>";
    </script>
    <script src="<?php echo URLROOT; ?>/public/js/main.js"></script>
    <script src="<?php echo URLROOT; ?>/public/js/home.js"></script>
    <script src="<?php echo URLROOT; ?>/public/js/add-file.js"></script>
</body>
</html>