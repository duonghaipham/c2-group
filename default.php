<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="icon" href="images/c2.jpg"/>
        <link rel="stylesheet" href="normalize.css"/>
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href="general_styles.css">
        <link rel="stylesheet" href="login/login_styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="login/login.js"></script>
        <title>NHÓM C2</title>
    </head>
    <body>
        <div id="popup" class="modal">
            <form class="modal-content animate" method="POST">
                <div id="container">
                    <span id="close" onClick="closeLogin()">&times;</span>
                    <input type="text" placeholder="Tên đăng nhập" name="username" required>
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                    <button type="submit">Đăng nhập</button>
                    <label>
                        <input type="checkbox" checked>Nhớ tên tài khoản
                    </label>
                </div>
            </form>
        </div>
        <div id="banner">
        </div>
        <div id="navbar">
            <a href="#members">Thành viên</a>
            <a href="#main">Nội dung</a>
            <a href="#about">Qui định</a>
            <a href="#logo">Logo</a>
            <a onclick="showLogin()">Đăng nhập</a>
        </div>
        <div id="content">
            <div id="content-1">
                <!-- This is column-1 -->
            </div>
            <div id="content-2">
                <figure>
                    <img src="images/background.jpg" alt="An image of my team" width="700">
                    <figcaption>Sinh viên công nghệ mà nhìn như đám cái bang</figcaption>
                </figure>
                <div id="information" class="section">
                    <h1>Thông tin nhóm</h1>
                    <ol>
                        <li>Tên nhóm: C2.</li>
                        <li>Lớp: 19CTT3A.</li>
                        <li>Mục đích thành lập: Đồ án cuối kỳ Thực hành Nhập môn Công nghệ thông tin.</li>
                        <li>Tên đề tài: Being bigger than yourself.</li>
                    </ol>
                    <a href="https://youtu.be/u0j2zY8RH1E">*Link video báo cáo đồ án</a>
                </div>
                <hr/>
                <div id="members" class="section">
                    <h1>Thành viên</h1>
                    <table>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>Ảnh đại diện</th>
                        </tr>
                        <?php
                            require_once("Member.php");

                            $server_name = "localhost";
                            $username = "root";
                            $password = "";
                            $database_name = "c2_group";

                            $connection = new mysqli($server_name, $username, $password, $database_name);
                            if ($connection->connect_error) {
                                die("Connection failed " . $connection->connect_error);
                            }

                            $query = "SELECT identity, name, gender, avatar FROM member";
                            $result = $connection->query($query);

                            if ($result->num_rows > 0) {
                                $ordinal_number = 1;
                                while ($row = $result->fetch_assoc()) {
                                    $url_page = "members/member.php?identity=" . $row["identity"];
                                    $img_src = "members/" . $row["avatar"];
                                    echo "<tr><td>" . $ordinal_number . "</td>" .
                                         "<td>" . $row["name"] . "</td>" .
                                         "<td>" . $row["gender"] . "</td>" .
                                         "<td><a href=$url_page><img src=$img_src width=100px></a></td></tr>";
                                    $ordinal_number++;
                                }
                            }
                            $connection->close();
                        ?>
                    </table>
                </div>
                <hr/>
                <div id="main" class="section">
                    <h1>Nội dung</h1>
                </div>
                <hr/>
                <div id="about" class="section">
                    <h1>Qui định</h1>
                    <div>
                        <p>Nguyên tắc hoạt động</p>
                        <ul>
                            <li>CÁC NGUYÊN TẮC LÀM VIỆC NHÓM
                                <ul>
                                    <li>NHỮNG ĐIỀU MỘT THÀNH VIÊN THUỘC VỀ NHÓM NHÓM PHẢI LÀM THEO:
                                        <ul>
                                            <li>Hoàn thành công việc được giao đúng thời hạn.</li>
                                            <li>Có trách nhiệm với nhóm.</li>
                                            <li>Tuân thủ các quy tác trường, lớp.</li>
                                            <li>Có chính kiến riêng.</li>
                                            <li>Lắng nghe nghiêm túc và góp ý chân thành.</li>
                                        </ul>
                                    </li>
                                    <li>NHỮNG ĐIỀU MỘT THÀNH VIÊN THUỘC VỀ NHÓM KHÔNG ĐƯỢC LÀM:
                                        <ul>
                                            <li>Vô trách nhiệm, hời hợt, làm cho có.</li>
                                            <li>Gây mất đoàn kết nhóm.</li>
                                            <li>Làm ảnh hưởng xấu tới nhóm.</li>
                                        </ul>
                                    </li>
                                    <li>NHỮNG ĐIỀU MỘT THÀNH VIÊN THUỘC VỀ NHÓM NÊN LÀM THEO:
                                        <ul>
                                            <li>Đóng góp ý kiến nhiệt tình.</li>
                                            <li>Góp ý cho các thành viên trong nhóm.</li>
                                            <li>Chia sẻ những thủ thuật hay, bài tập hay cho nhóm.</li>
                                            <li>Giúp các thành viên trong nhóm trong lĩnh vực mình giỏi.</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>KẾ HOẠCH GIAO TIẾP NHÓM
                                <ul>
                                    <li>Tần suất gặp mặt hàng tuần: Mỗi tuần 1 lần.</li>
                                    <li>Thời gian: Trưa thứ 4 sau khi học xong.</li>            
                                    <li>Địa điểm: Phòng tự học tại trường.</li>     
                                    <li>Thông báo thông qua: Email, group nhóm (Facebook Messenger).</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr/>
                <div id="logo" class="section">
                    <h1>Logo</h1>
                    <figure>
                        <img src="images/c2.jpg" alt="Image of group's logo" width="200">
                        <figcaption>Logo nhóm</figcaption>
                    </figure>
                    <ul>
                        <li><b>C2</b>: là tên của nhóm.</li>
                        <li><b>Màu nền cam</b>: sắc cam sặc sỡ, tươi vui, toả ra năng lượng và sự ấm áp, là một màu sắc mang nhiều ý nghĩa. Màu cam thụ hưởng sự mạnh mẽ của màu đỏ và sự hạnh phúc của màu vàng. Nó biểu trưng cho sự đam mê, phấn khởi, hạnh phúc, sáng tạo, quyết đoán, kích thích, thành công, mang biểu tượng của sức mạnh, sự bền bỉ.</li>
                        <li><b>"Being bigger than yourself"</b>: slogan của nhóm đồng thời cũng là đề tài mà nhóm cùng nhau tìm hiểu.</li>
                        <li><b>Con báo bước từ phía sau</b>: cho thấy sự ý chí vượt lên phía trước của nhóm, báo là một loài động vật ăn thịt có tốc độ cao. Đặc biệt là báo đen, biểu tượng cho sức mạnh và tốc độ vượt trội. Loài báo là loài săn mồi dựa vào tốc độ của mình, con mồi yêu thích nó là những động vật ăn cỏ như hưu, nai... đây là cuộc chiến sinh tồn mà tốc độ là thứ dẫn đến kết quả, bên nào có tốc độ nhanh hơn, bên đó sẽ thắng. Vì vậy qua mỗi ngày, chúng phải nâng cao tốc độ của mình lên nếu không muốn bị đào thải. Cũng như con người chúng ta, nếu chúng ta thỏa mãn với những gì ở hiện tại mà không tự phá bỏ giới hạn của mình để vươn lên thì một ngày nào đó, những kẻ đi trước sẽ không ngừng nới rộng khoảng cách, những kẻ đi sau sẽ vượt qua chúng ta. Vì vậy muốn sinh tồn trong cuộc sống này, chúng ta cần không ngừng bứt phá để đạt được những thành công to lớn.</li>
                    </ul>
                </div>
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