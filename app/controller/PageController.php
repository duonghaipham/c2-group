<?php
class PageController extends Controller {

    public function home() {
        if (isset($_SESSION['student_id']))
            $this->view('home', []);
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