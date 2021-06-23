<?php
class PageController extends Controller {

    public function home() {
        $this->view('home', []);
    }

    public function member() {
        $this->view('member', []);
    }

    public function about() {
        $this->view('about', []);
    }
}