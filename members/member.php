<?php
    require_once("../Member.php");

    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "c2_group";

    $connection = new mysqli($server_name, $username, $password, $database_name);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $identity = $_GET["identity"];
    $query = "SELECT * FROM member WHERE IDENTITY = $identity";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $current_member = new Member($row["name"], $row["identity"], $row["email"], $row["hometown"], $row["hobby"], $row["avatar"]);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="icon" href="../images/c2.jpg"/>
        <link rel="stylesheet" href="../general_styles.css"/>
        <link rel="stylesheet" href="members_styles.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="banner">
        </div>
        <div id="navbar">
            <a href="../default.php">Trang chủ</a>
        </div>
        <div id="overview">
            <figure id="avatar">
                <?php
                    echo "<img src=\"" . $current_member->getAvatar() . "\"/>";
                ?>
                <figcaption>Ảnh đại diện</figcaption>
            </figure>
            <div id="information">
                <ul>
                    <?php
                        echo "<li>Họ tên: " . $current_member->getName() . ".</li>" .
                            "<li>MSSV: " . $current_member->getIdentity() . ".</li>" .
                            "<li>Email: " . $current_member->getEmail() . ".</li>" .
                            "<li>Quê quán: " . $current_member->getHometown() . ".</li>" .
                            "<li>Sở thích: " . $current_member->getHobby() . ".</li>";
                    ?>
                </ul>
            </div>
        </div>
        <div id="footer">
            <p>Designed by Tyler &#169; 2021</p>
            <div id="social-networking">
                <a class="sns-item" href="https://www.facebook.com/duong2001.ph">
                    <i class="fa fa-facebook-square"></i>
                    <span>Facebook</span>
                </a>
                <a class="sns-item" href="https://twitter.com/duongphamit">
                    <i class="fa fa-twitter-square"></i>
                    <span>Twitter</span>
                </a>
                <a class="sns-item" href="https://github.com/phduong2001">
                    <i class="fa fa-github-square"></i>
                    <span>GitHub</span>
                </a>
                <a class="sns-item" href="mailto:phduongit2k1@gmail.com">
                    <i class="fa fa-envelope"></i>
                    <span>Mail</span>
                </a>
            </div>
        </div>
    </body>
</html>