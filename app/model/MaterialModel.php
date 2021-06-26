<?php
class MaterialModel {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function add($creator, $title, $description, $file) {
        Storage::get_instance()->write_file_to_db($this->db, $file, $creator);

        $create_post_query = 'INSERT INTO material (creator, file, title, description) ' .
            'VALUES (:creator, :file, :title, :description)';
        $this->db->query($create_post_query);
        $this->db->bind(':creator', $creator);
        $this->db->bind(':file', $file['new_name']);
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->execute();
    }

    public function get_all() {
        $get_materials_query =
            'SELECT material.*, member.name, member.avatar, storage.old_name ' .
            'FROM material JOIN member ON material.creator = member.student_id ' .
            'LEFT JOIN storage ON material.file = storage.new_name ' .
            'ORDER BY material.material_id DESC';
        $this->db->query($get_materials_query);
        return $this->db->result_set();
    }
}