<?php

class Login extends Controller {

    public function index() {
        $user = $this->model('User');

        if (isset($_POST['Email'])) {
            $user->email = $_POST['Email'];
        }

        if (isset($_POST['username'])) {
            $user->username = $_POST['username'];
        }

        if (isset($_POST['password'])) {
            $user->password = $_POST['password'];
        }

        $user->authenticate();

        if ($user->auth == TRUE) {
            $_SESSION['auth'] = true;
        }

        //get user to indicate the profile is complete or not.
        if (isset($_SESSION['username'])) {
            $user = $user->getUser();
            if (empty($user->firstname) || empty($user->lastname) || empty($user->dob) || empty($user->phone)) {
                $this->view('user/profile', $user);
            }else{
                $this->view('home/reminder');
            }
        } else {
            header('Location: ' . HOME);
        }
    }

    public function register() {
        $user = $this->model('User');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['Email'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            $user->register($username, $password, $email);
            $this->view('home/login');
        } else {
            $this->view('home/register');
        }
    }

}
