<div class="full-screen">
    <div class="container">
        <div class="header">
            <img src="<?php echo URLROOT; ?>/public/img/c2.jpg" alt="Logo web">
            <h1>C2 Portal</h1>
        </div>
        <form action="<?php echo URLROOT; ?>/member/login" method="POST">
            <input type="text" placeholder="Tên đăng nhập" name="username" required>
            <input type="password" placeholder="Mật khẩu" name="password" required>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</div>