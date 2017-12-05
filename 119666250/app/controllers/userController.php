<?php

class UserController extends Controller {

    public function profile() {
        $user = $this->model('User');
        $user->username = $_SESSION['username'];
        $user = $user->getUser();
        
        $this->view('user/profile', $user);
    }

    public function updateprofile() {
        $user = $this->model('User');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user->username = $_SESSION['username'];
            $user->password = $_POST['password'];
            $user->dob = $_POST['dob'];
            $user->phone = $_POST['phone'];
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->email = $_POST['email'];

            $today = date("Y-m-d");
            $diff = date_diff(date_create($user->dob), date_create($today));
            if($diff->format('%y') < 18){
                echo "<script>alert('Age must be at least 18 years old!');</script>";
                $this->view('user/profile', $user);
                die;
            }

            $user->updateProfile();
            echo "<script>alert('Profile is updated!');</script>";
            $this->view('home/reminder');
            die;
        } else {
            $this->view('user/profile', $user);
            die;
        }
    }

    public function report(){
        $user = $this->model('User');
        $this->view('reports/users', $user);
    }
}
