CREATE DATABASE c2_group;

USE c2_group;

CREATE TABLE member (
    student_id CHAR(8),
    password VARCHAR(100),
    name VARCHAR(100) CHARSET UTF8,
    gender VARCHAR(3) CHARSET UTF8,
    email VARCHAR(100),
    hometown VARCHAR(100) CHARSET UTF8,
    hobby VARCHAR(1000) CHARSET UTF8,
    avatar VARCHAR(70),
    PRIMARY KEY (student_id)
);

CREATE TABLE storage (
    owner CHAR(8),
    new_name VARCHAR(70),
    old_name VARCHAR(100),
    created_at DATETIME,
    PRIMARY KEY (new_name, owner)
);

CREATE TABLE post (
    post_id INT AUTO_INCREMENT,
    creator CHAR(8),
    file VARCHAR(70),
    content VARCHAR(1000) CHARSET UTF8,
    created_at DATETIME,
    PRIMARY KEY (post_id)
);

CREATE TABLE comment (
    comment_id INT AUTO_INCREMENT,
    creator CHAR(8),
    file VARCHAR(70),
    post_id INT,
    content VARCHAR(1000) CHARSET UTF8,
    created_at DATETIME,
    PRIMARY KEY (comment_id)
);

CREATE TABLE material (
    material_id INT AUTO_INCREMENT,
    creator CHAR(8),
    file VARCHAR(70),
    title VARCHAR(500) CHARSET UTF8,
    description VARCHAR(100) CHARSET UTF8,
    created_at DATETIME,
    PRIMARY KEY (material_id)
);

CREATE TABLE poll (
    poll_id INT AUTO_INCREMENT,
    creator CHAR(8),
    title VARCHAR(500) CHARSET UTF8,
    created_at DATETIME,
    PRIMARY KEY (poll_id)
);

CREATE TABLE choice (
    poll_id INT,
    choice_id INT,
    content VARCHAR(500) CHARSET UTF8,
    PRIMARY KEY (poll_id, choice_id)
);

CREATE TABLE choosing (
    student_id CHAR(8),
    poll_id INT,
    choice_id INT,
    PRIMARY KEY (student_id, poll_id)
);

-- Check gender constraint

ALTER TABLE member
ADD CONSTRAINT CHK_GENDER
CHECK (gender IN ('Nam', 'Nữ'));

-- Default created_at constraint

ALTER TABLE storage
ALTER created_at SET DEFAULT NOW();

ALTER TABLE post
ALTER created_at SET DEFAULT NOW();

ALTER TABLE comment
ALTER created_at SET DEFAULT NOW();

ALTER TABLE material
ALTER created_at SET DEFAULT NOW();

ALTER TABLE poll
ALTER created_at SET DEFAULT NOW();

-- Foreign key constraint

ALTER TABLE member
ADD CONSTRAINT FK_AVATAR_IS_FILE
FOREIGN KEY (student_id, avatar) REFERENCES storage(owner, new_name);

ALTER TABLE storage
ADD CONSTRAINT FK_OWNER_IS_MEMBER
FOREIGN KEY (owner) REFERENCES member(student_id);

ALTER TABLE post
ADD CONSTRAINT FK_POST_CREATOR_IS_MEMBER
FOREIGN KEY (creator) REFERENCES member(student_id);

ALTER TABLE post
ADD CONSTRAINT FK_POST_FILE_IN_STORAGE
FOREIGN KEY (creator, file) REFERENCES storage(owner, new_name);

ALTER TABLE comment
ADD CONSTRAINT FK_COMMENT_CREATOR_IS_MEMBER
FOREIGN KEY (creator) REFERENCES member(student_id);

ALTER TABLE comment
ADD CONSTRAINT FK_COMMENT_BELONGS_TO_POST
FOREIGN KEY (post_id) REFERENCES post(post_id);

ALTER TABLE comment
ADD CONSTRAINT FK_COMMENT_FILE_IN_STORAGE
FOREIGN KEY (creator, file) REFERENCES storage(owner, new_name);

ALTER TABLE material
ADD CONSTRAINT FK_MATERIAL_CREATOR_IS_MEMBER
FOREIGN KEY (creator) REFERENCES member(student_id);

ALTER TABLE material
ADD CONSTRAINT FK_MATERIAL_FILE_IN_STORAGE
FOREIGN KEY (creator, file) REFERENCES storage(owner, new_name);

ALTER TABLE poll
ADD CONSTRAINT FK_POLL_CREATOR_IS_MEMBER
FOREIGN KEY (creator) REFERENCES member(student_id);

ALTER TABLE choice
ADD CONSTRAINT FK_CHOICE_IN_POLL
FOREIGN KEY (poll_id) REFERENCES poll(poll_id);

ALTER TABLE choosing
ADD CONSTRAINT FK_MEMBER_CHOOSE_CHOICE
FOREIGN KEY (student_id) REFERENCES member(student_id);

ALTER TABLE choosing
ADD CONSTRAINT FK_CHOOSING_IN_POLL
FOREIGN KEY (poll_id, choice_id) REFERENCES choice(poll_id, choice_id);

-- Initial data

INSERT INTO member (student_id, password, name, gender, email, hometown, hobby) VALUES
('19120480', '19120480', 'Lê Ngọc Du', 'Nam', 'lengocdu123654tl@gmail.com', 'Khánh Hòa', 'Bơi lội, học toán, nghe nhạc'),
('19120481', '19120481', 'Đàm Hồng Đức', 'Nam', 'hongduc001h@gmail.com', 'Bình Phước', 'Chơi LOL, PUBG, nghe nhạc, xem phim'),
('19120489', '19120489', 'Lưu Trường Dương', 'Nam', 'luutruongduong20@gmail.com', 'Đắk Lắk', 'Chơi games, đọc truyện, ngủ'),
('19120490', '19120490', 'Phạm Hải Dương', 'Nam', 'phduongit2k1@gmail.com', 'Đồng Tháp', 'Đi chơi, về quê, xem phim'),
('19120493', '19120493', 'Hồ Đắc Duy', 'Nam', 'hoduy220@gmail.com', 'Khánh Hòa', 'Đọc truyện, nghe nhạc, xem phim'),
('19120499', '19120499', 'Nguyễn Lê Thanh Hằng', 'Nữ', 'eunicestars72@gmail.com', 'Quảng Nam', 'Chạy bộ, chơi cầu lông, đọc sách'),
('19120503', '19120503', 'Nguyễn Thanh Hiền', 'Nữ', 'nguyenthanhhienbmt@gmail.com', 'Đắk Lắk', 'Đọc sách, nghe nhạc, xem phim'),
('19120515', '19120515', 'Nguyễn Huy Hoàng', 'Nam', 'nguyenhuyhoang290701@gmail.com', 'Hà Tĩnh', 'Chơi games, đá bóng, đọc truyện'),
('19120517', '19120517', 'Trương Văn Hoàng', 'Nam', 'hoangtruongvann@gmail.com', 'Gia Lai', 'Chơi games');

INSERT INTO storage(owner, new_name) VALUES
('19120480', 'Du.png'),
('19120481', 'Duc.png'),
('19120489', 'TruongDuong.png'),
('19120490', 'HaiDuong.png'),
('19120493', 'Duy.png'),
('19120499', 'Hang.png'),
('19120503', 'Hien.png'),
('19120515', 'HuyHoang.png'),
('19120517', 'Hoang.png');

UPDATE member, storage
SET member.avatar = storage.new_name
WHERE member.student_id = storage.owner;