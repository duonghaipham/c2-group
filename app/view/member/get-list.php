<div id="content">
    <div id="members">
        <h1>Danh sách thành viên</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Avatar</th>
            </tr>
            <?php for ($i = 0; $i < count($list_members); $i++): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $list_members[$i]->name; ?></td>
                <td><?php echo $list_members[$i]->gender; ?></td>
                <td>
                    <a href="<?php echo URLROOT . '/member/watch/' . $list_members[$i]->student_id; ?>">
                        <img src="<?php echo URLROOT . '/data/img/' . $list_members[$i]->avatar; ?>"
                             alt="<?php echo $list_members[$i]->name; ?>">
                    </a>
                </td>
            </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>