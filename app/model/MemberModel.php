<?php
class MemberModel {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($student_id, $password) {
        $login_query = 'SELECT * FROM member WHERE student_id = :student_id AND password = :password';
        $this->db->query($login_query);
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':password', $password);
        $this->db->execute();

        if ($this->db->row_count() > 0)
            return true;
        return false;
    }

    public function get_list() {
        $get_all_query = 'SELECT student_id, name, gender, avatar FROM member';
        $this->db->query($get_all_query);

        return $this->db->result_set();
    }

    public function watch($student_id) {
        $watch_profile_query =
            'SELECT * ' .
            'FROM member ' .
            'WHERE student_id = :student_id';
        $this->db->query($watch_profile_query);
        $this->db->bind(':student_id', $student_id);

        return $this->db->single();
    }
}