<?php
class PollController extends Controller {

    private $poll_model;

    public function __construct() {
        $this->poll_model = $this->model('PollModel');
    }

    public function create() {
        if (isset($_SESSION['student_id']))
            $this->view('create-vote', []);
        else
            header('Location:' . URLROOT);
    }

    public function add() {
        if (isset($_SESSION['student_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $this->poll_model->add(
                    array_shift($_POST),
                    $_POST,
                    $_SESSION['student_id']
                );
                header('Location:' . URLROOT);
            }
        }
    }

    public function make($poll_id) {
        if (isset($_SESSION['student_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $choice_data = $this->poll_model->make(
                    $poll_id,
                    $_POST['option'],
                    $_SESSION['student_id']
                );
                $response = Storage::get_instance()->array_to_xml($choice_data);
                echo $response;
            }
        }
    }
}