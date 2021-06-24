<?php
class Storage {

    private static $instance = null;

    private function __construct() { }

    public static function get_instance(): ?Storage {
        if (self::$instance == null)
            self::$instance = new Storage();
        return self::$instance;
    }

    public function save_file($file_var, $path) {
        if ($_FILES[$file_var]['error'] == 0) {
            $file_name = $_FILES[$file_var]['name'];
            $tmp_file_name = $_FILES[$file_var]['tmp_name'];
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            $hashed_file_name = hash_file('sha256', $tmp_file_name);
            $path_file =  $path . $hashed_file_name . '.' . $file_extension;
            move_uploaded_file($tmp_file_name, $path_file);

            return array(
                'old_name' => $file_name,
                'new_name' => $hashed_file_name . '.' . $file_extension
            );
        }
        return false;
    }

    public function remove_file($path) {

    }
}