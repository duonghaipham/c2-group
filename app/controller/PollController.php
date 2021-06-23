<?php
class PollController extends Controller {

    public function create() {
        $this->view('create-vote', []);
    }
}