<div id="content">
    <h1>Sẵn sàng chia sẻ tài liệu của bạn</h1>
    <form method="POST" enctype="multipart/form-data" action="<?php echo URLROOT . '/material/add'; ?>">
        <input type="text" name="title" placeholder="Tiêu đề" required>
        <textarea name="post" placeholder="Mô tả (không bắt buộc)"></textarea>
        <div id="insert">
            <label for="input-file"><i class="fa"></i> Thêm</label>
            <input type="file" name="pin-file" id="input-file">
            <button type="submit">Chia sẻ ngay</button>
        </div>
    </form>
</div>