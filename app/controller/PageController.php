<?php
class PageController extends Controller {

    private $post_model;
    private $member_model;
    private $material_model;
    private $poll_model;

    public function __construct() {
        $this->post_model = $this->model('PostModel');
        $this->member_model = $this->model('MemberModel');
        $this->material_model = $this->model('MaterialModel');
        $this->poll_model = $this->model('PollModel');
    }

    public function home() {
        if (isset($_SESSION['student_id'])) {
            $post_data = $this->post_model->get_all();
            $material_data = $this->material_model->get_all();
            $poll_data = $this->poll_model->get_all();
            $work_data = array_merge((array) $material_data, (array) $poll_data);
            usort($work_data, fn($lhs, $rhs) => strcmp($lhs->created_at, $rhs->created_at) < 0);
            $this->view('home', ['post_data' => $post_data, 'work_data' => $work_data]);
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