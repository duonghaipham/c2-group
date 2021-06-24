<?php
class PageController extends Controller {

    private $post_model;

    public function __construct() {
        $this->post_model = $this->model('PostModel');
    }

    public function home() {
        if (isset($_SESSION['student_id'])) {
            $post_data = $this->post_model->get_all();
            $this->view('home', ['post_data' => $post_data]);
        }
        else
            header('Location:' . URLROOT);
    }

    public function member() {
        if (isset($_SESSION['student_id']))
            $this->view('member', []);
        else
            header('Location:' . URLROOT);
    }

    public function about() {
        if (isset($_SESSION['student_id']))
            $this->view('about', []);
        else
            header('Location:' . URLROOT);
    }
}