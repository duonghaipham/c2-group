<?php
class PostModel {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($student_id, $content, $file) {
        Storage::get_instance()->write_file_to_db($this->db, $file, $student_id);

        $create_post_query = 'INSERT INTO post (creator, file, content) ' .
            'VALUES (:creator, :file, :content)';
        $this->db->query($create_post_query);
        $this->db->bind(':creator', $student_id);
        $this->db->bind(':file', $file['new_name']);
        $this->db->bind(':content', $content);
        $this->db->execute();
    }

    public function get_all() {
        $get_all_posts_query =
            'SELECT p.*, m.name, m.avatar, s.old_name ' .
            'FROM post p JOIN member m ON p.creator = m.student_id ' .
            'LEFT JOIN storage s ON p.file = s.new_name ' .
            'ORDER BY p.post_id DESC';
        $this->db->query($get_all_posts_query);

        $list_posts = $this->db->result_set();
        for ($i = 0; $i < count($list_posts); $i++) {
            $list_posts[$i] = (array) $list_posts[$i];
            $list_posts[$i]['comments'] = $this->get_comments($list_posts[$i]['post_id']);
            $list_posts[$i] = (object) $list_posts[$i];
        }
        return $list_posts;
    }

    public function comment($creator, $post_id, $content) {
        $add_comment_query =
            'INSERT INTO comment(creator, post_id, content) ' .
            'VALUES (:creator, :post_id, :content)';
        $this->db->query($add_comment_query);
        $this->db->bind(':creator', $creator);
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':content', $content);
        $this->db->execute();

        $get_last_comment_id_query = 'SELECT LAST_INSERT_ID() AS comment_id';
        $this->db->query($get_last_comment_id_query);
        return $this->db->single()->comment_id;
    }

    public function get_comments($post_id) {
        $get_comment_query =
            'SELECT c.*, m.name, m.avatar ' .
            'FROM comment c JOIN member m ON c.creator = m.student_id ' .
            'WHERE c.post_id = :post_id ' .
            'ORDER BY c.comment_id';
        $this->db->query($get_comment_query);
        $this->db->bind(':post_id', $post_id);

        return $this->db->result_set();
    }

    public function get_comment_by_id($comment_id) {
        $get_comment_query =
            'SELECT c.*, m.name, m.avatar ' .
            'FROM comment c JOIN member m ON c.creator = m.student_id ' .
            'WHERE c.comment_id = :comment_id ';
        $this->db->query($get_comment_query);
        $this->db->bind(':comment_id', $comment_id);

        return $this->db->single();
    }
}