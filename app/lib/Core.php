<?php
class Core {    // /controller/method/params

    protected $current_controller = 'User';
    protected $current_method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->get_url();

        if(file_exists('app/controller/' . ucwords($url[0]) . 'Controller.php')) {
            $this->current_controller = ucwords($url[0]);
            unset($url[0]);
        }
        require_once 'app/controller/' . $this->current_controller . 'Controller.php';   // require controller
        $this->current_controller = new ($this->current_controller . 'Controller');  // instantiate controller

        if(isset($url[1])){
            if(method_exists($this->current_controller, $url[1])){
                $this->current_method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : []; // get params
        call_user_func_array([$this->current_controller, $this->current_method], $this->params);
    }

    public function get_url() {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return false;
    }
}