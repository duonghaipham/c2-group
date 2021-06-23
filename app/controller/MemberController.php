<?php
class MemberController extends Controller {

    private $member_model;

    public function __construct() {
        $this->member_model = $this->model('MemberModel');
    }

    public function index() {
        $this->view('login', []);
    }

    public function watch() {
        $this->view('profile', []);
    }
}