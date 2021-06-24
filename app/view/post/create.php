<div id="create-post">
    <form action="<?php echo URLROOT; ?>/post/create" method="POST" enctype="multipart/form-data">
        <textarea name="post" placeholder="Bạn muốn thảo luận điều gì?"></textarea>
        <div id="insert">
            <label for="input-file"><i class="fa"></i> Thêm</label>
            <input type="file" name="pin-file" id="input-file">
            <button type="submit">Đăng</button>
        </div>
    </form>
</div>