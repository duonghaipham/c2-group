<div id="overview">
    <img src="<?php echo URLROOT . '/data/img/' . $profile_data->avatar; ?>" alt="Avatar">
    <div id="information">
        <h1><?php echo $profile_data->name; ?></h1>
        <button type="button" id="profile-view">Xem chi tiết</button>
        <ul id="profile-detail">
            <li><i class="fa" id="gender"></i><?php echo $profile_data->gender; ?></li>
            <li><i class="fa" id="id"></i><?php echo $profile_data->student_id; ?></li>
            <li><i class="fa" id="mail"></i><?php echo $profile_data->email; ?></li>
            <li><i class="fa" id="home"></i><?php echo $profile_data->hometown; ?></li>
            <li><i class="fa" id="hobby"></i><?php echo $profile_data->hobby; ?></li>
        </ul>
    </div>
</div>