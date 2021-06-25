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

    public function array_to_xml($array, $root_element = null, $xml = null) {
        if (!isset($xml))
            $xml = new SimpleXMLElement($root_element ?? '<root/>');

        foreach ($array as $key => $value)
            if (is_array($value))
                $this->array_to_xml($value, $key, $xml->addChild($key));
            else
                $xml->addChild($key, $value);
        return $xml->asXML();
    }
}