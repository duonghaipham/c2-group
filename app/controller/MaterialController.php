<?php
class MaterialController extends Controller {

    private $material_model;

    public function __construct() {
        $this->material_model = $this->model('MaterialModel');
    }

    public function create() {
        if (isset($_SESSION['student_id'])) {
            $this->view('create-material', []);
        }
        else
            header('Location:' . URLROOT);
    }

    public function add() {
        if (isset($_SESSION['student_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $this->material_model->add(
                    $_SESSION['student_id'],
                    $_POST['title'],
                    $_POST['post'],
                    Storage::get_instance()->save_file('pin-file', 'data/material/')
                );
                header('Location:' . URLROOT . '/home');
            }
        }
    }
}