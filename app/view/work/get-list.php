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
                <form method="POST" id="poll-<?php echo $work->poll_id; ?>" class="poll">
                    <?php
                    if (isset($work->choice['my_choice'])) {
                        $my_choice = $work->choice['my_choice'];
                        $choice_size = count($work->choice) - 1;
                    }
                    else
                        $choice_size = count($work->choice);
                    for ($i = 0; $i < $choice_size; $i++):
                    $choice = $work->choice[$i];
                    ?>
                    <div class="option">
                        <?php
                        if (isset($my_choice)):
                            if ($my_choice == $i):
                            ?>
                        <input type="radio" name="option" id="option-<?php echo $choice->choice_id; ?>" value="<?php echo $choice->choice_id; ?>" checked disabled>
                            <?php else: ?>
                            <input type="radio" name="option" id="option-<?php echo $choice->choice_id; ?>" value="<?php echo $choice->choice_id; ?>" disabled>
                            <?php endif; ?>
                        <label for="option-<?php echo $choice->choice_id; ?>"><?php echo $choice->content; ?></label>
                        <span><?php echo $choice->frequency; ?> lượt chọn</span>
                        <?php else: ?>
                        <input type="radio" name="option" id="option-<?php echo $choice->choice_id; ?>" value="<?php echo $choice->choice_id; ?>">
                        <label for="option-<?php echo $choice->choice_id; ?>"><?php echo $choice->content; ?></label>
                        <?php endif; ?>
                    </div>
                    <?php endfor;
                    if (!isset($my_choice))
                        echo '<button type="submit" >Xem kết quả</button>';
                    else
                        unset($my_choice);
                    ?>
                </form>
            </div>
        </div>
    <?php endif;
    endforeach; ?>
</div>