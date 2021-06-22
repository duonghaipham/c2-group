<?php
class Database {

    private $statement;
    private $db_handler;
    private $error;

    public function __construct() {
        $conn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->db_handler = new PDO($conn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql) {
        $this->statement = $this->db_handler->prepare($sql);
    }

    public function bind($param, $value, $type = null) {
        $type = match (is_null($type)) {
            is_int($value) => PDO::PARAM_INT,
            is_bool($value) => PDO::PARAM_BOOL,
            is_null($value) => PDO::PARAM_NULL,
            default => PDO::PARAM_STR,
        };
        $this->statement->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->statement->execute();
    }

    public function result_set() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function row_count() {
        return $this->statement->rowCount();
    }
}