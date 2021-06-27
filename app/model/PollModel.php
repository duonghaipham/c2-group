<?php
class PollModel {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function add($title, $list_choices, $creator) {
        $add_poll_query =
            'INSERT INTO poll (creator, title)' .
            'VALUES (:creator, :title)';
        $this->db->query($add_poll_query);
        $this->db->bind(':creator', $creator);
        $this->db->bind(':title', $title);
        $this->db->execute();

        $get_poll_id_query = 'SELECT LAST_INSERT_ID() AS poll_id';
        $this->db->query($get_poll_id_query);
        $poll_id = $this->db->single()->poll_id;

        $i = 0;
        foreach ($list_choices as $choice) {
            $add_choice_query =
                'INSERT INTO choice(poll_id, choice_id, content) ' .
                'VALUES (:poll_id, :choice_id, :content)';
            $this->db->query($add_choice_query);
            $this->db->bind(':poll_id', $poll_id);
            $this->db->bind(':choice_id', $i);
            $this->db->bind(':content', $choice);
            $this->db->execute();
            $i++;
        }
    }

    public function get_all() {
        $get_polls_query =
            'SELECT poll.*, member.name, member.avatar ' .
            'FROM poll JOIN member ON poll.creator = member.student_id ' .
            'ORDER BY poll.poll_id DESC';
        $this->db->query($get_polls_query);
        $list_polls = (array) $this->db->result_set();

        for ($i = 0; $i < count($list_polls); $i++) {
            $list_polls[$i] = (array) $list_polls[$i];
            $list_polls[$i]['choice'] = $this->get_choice_by_poll($list_polls[$i]['poll_id']);
            $list_polls[$i] = (object) $list_polls[$i];
        }
        return (object) $list_polls;
    }

    public function get_choice_by_poll($poll_id) {
        $get_choices_query =
            'SELECT * ' .
            'FROM choice ' .
            'WHERE poll_id = :poll_id';
        $this->db->query($get_choices_query);
        $this->db->bind(':poll_id', $poll_id);

        return $this->db->result_set();
    }

    public function make($poll_id, $choice_id, $student_id) {
        $do_poll_query =
            'INSERT INTO choosing(student_id, poll_id, choice_id) ' .
            'VALUES (:student_id, :poll_id, :choice_id)';
        $this->db->query($do_poll_query);
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':poll_id', $poll_id);
        $this->db->bind(':choice_id', $choice_id);
        $this->db->execute();

        $poll_data = $this->get_result($poll_id);
        for ($i = 0; $i < count($poll_data); $i++) {
            $poll_data[$i] = (array) $poll_data[$i];
            $poll_data['_' . $i] = $poll_data[$i];
            unset($poll_data[$i]);
        }
        return $poll_data;
    }

    public function get_result($poll_id) {
        $get_poll_result_query =
            'SELECT * ' .
            'FROM choosing ' .
            'WHERE poll_id = :poll_id';
        $this->db->query($get_poll_result_query);
        $this->db->bind(':poll_id', $poll_id);

        return $this->db->result_set();
    }
}