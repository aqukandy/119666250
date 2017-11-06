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
        
        header('Location: /home');
    }
	
    public function register () {	
        $user = $this->model('User');
	
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['Email'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];
						
            $user->register($email, $username, $password);
        }
		
        $this->view('home/register');
    }
}
