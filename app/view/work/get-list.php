<div id="list-posts">
    <?php foreach ($work_data as $work):
        if (isset($work->material_id)): ?>
        <div class="general-post">
            <div class="summary">
                <p class="title"><?php echo $work->title; ?></p>
                <div class="meta-info">
                    <p class="date-time">Đăng vào <?php echo $work->created_at; ?></p>
                    <a href="<?php echo URLROOT . '/member/watch/' . $work->creator; ?>">
                        <img src="<?php echo URLROOT . '/data/img/' . $work->avatar; ?>" alt="Avatar of post creator">
                    </a>
                </div>
            </div>
            <div class="detail">
                <hr>
                <p class="post"><?php echo $work->description; ?></p>
                <?php if (isset($work->file)): ?>
                    <a href="<?php echo URLROOT . '/data/material/' . $work->file; ?>"><?php echo $work->old_name; ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="general-post">
            <div class="summary">
                <p class="title"><?php echo $work->title; ?></p>
                <div class="meta-info">
                    <p class="date-time">Đăng vào <?php echo $work->created_at; ?></p>
                    <a href="<?php echo URLROOT . '/member/watch/' . $work->creator; ?>">
                        <img src="<?php echo URLROOT . '/data/img/' . $work->avatar; ?>" alt="Avatar of post creator">
                    </a>
                </div>
            </div>
            <div class="detail">
                <hr>
                <form method="POST">
                    <?php foreach ($work->choice as $choice): ?>
                    <div class="option">
                        <input type="radio" name="option" id="option-<?php echo $choice->choice_id; ?>">
                        <label for="option-<?php echo $choice->choice_id; ?>"><?php echo $choice->content; ?></label>
                    </div>
                    <?php endforeach; ?>
                    <button type="button">Xem kết quả</button>
                </form>
            </div>
        </div>
    <?php endif;
    endforeach; ?>
</div>