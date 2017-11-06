<?php

class Home extends Controller {
    public function index($name = '') {
        if(isset($_SESSION['username'])){
            $reminder = $this->model('Reminders');
            $this->view('home/reminder', $reminder);
        }else{
            $this->login();
        }
    }
    
    public function login($name = '') {
        $this->view('home/login');
    }

}
