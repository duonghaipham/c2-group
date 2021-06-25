<?php
class PageController extends Controller {

    private $post_model;
    private $member_model;

    public function __construct() {
        $this->post_model = $this->model('PostModel');
        $this->member_model = $this->model('MemberModel');
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
        if (isset($_SESSION['student_id'])) {
            $list_members = $this->member_model->get_list();
            $this->view('member', ['list_members' => $list_members]);
        }
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