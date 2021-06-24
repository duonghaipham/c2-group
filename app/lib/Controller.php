<?php
class Controller {
    
    public function model($model) {
        require_once 'app/model/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = []) {
        foreach ($data as $key => $value)
            $$key = $value;
        if (file_exists('app/view/' . $view . '.php'))
            require_once 'app/view/' . $view . '.php';
        else
            die("View does not exist.");
    }
}
