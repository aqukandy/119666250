<?php

class User {

    public $username;
    public $password;
    public $auth = false;
    public $email;
    public $attempt;
    public $time;
    public $subjects;
    public $description;
    public $firstname;
    public $lastname;
    public $dob;
    public $phone;

    public function __construct() {
        
    }

    public function get_reminders() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE username = :username AND deleted = 0;");
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function get_reminder($id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE id = :id;");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function removeItem($id) {
        $db = db_connect();

        $statement = $db->prepare("UPDATE reminders SET deleted = 1 WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function addToTable() {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO reminders  (Id, Username, subjects,Description)"
                . "VALUES (:id, :username, :subjects, :description); ");
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->bindValue(':id', 1);
        $statement->bindValue(':subjects', $subjects);
        $statement->bindValue(':description', $description);
        $statement->execute();
    }

    public function authenticate() {
        $db = db_connect();
        $statement = $db->prepare("select Username, Password from users WHERE Username = :name;");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $hash_pwd = $rows[0]['Password'];
        $password = $this->password;

        if (!password_verify($password, $hash_pwd)) {
            $attempts = 1;
            $statement = $db->prepare("select * from wronglog WHERE Username = :name;");
            $statement->bindValue(':name', $this->username);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            $attempt_number = $rows[0]['Attempt'];

            if ($attempt_number >= 3) {
                sleep(60);
                $statement = $db->prepare("UPDATE wronglog SET Attempt = :attempt WHERE Username = :user");
                $statement->bindValue(':user', $this->username);
                $statement->bindValue(':attempt', 0);
                $statement->execute();
                $this->auth = false;
            }

            if ($rows) {
                $attempts = $attempt_number + 1;
                $statement = $db->prepare("UPDATE wronglog SET Attempt = :attempt WHERE Username = :user");
                $statement->bindValue(':user', $this->username);
                $statement->bindValue(':attempt', $attempts);
                $statement->execute();
            } else {
                $statement_ = $db->prepare("INSERT INTO wronglog (Username, Attempt)"
                        . "VALUES (:username, :attempt); ");
                $statement_->bindValue(':username', $this->username);
                $statement_->bindValue(':attempt', $attempts);
                $statement_->execute();
            }
            $this->auth = false;
        } else {
            $this->auth = true;
            $_SESSION['username'] = $rows[0]['Username'];
            $_SESSION['password'] = $rows[0]['Password'];
        }
    }

    public function register($username, $password, $email) {
        if (strlen($password) >= 3) {
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $db = db_connect();
            $statement = $db->prepare("INSERT INTO users (Username, Password, Email) "
                    . " VALUES(:username, :password, :email);");
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $hashPass);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $_SESSION['auth'] = true;

            $this->addProfile($username);
        } else {
            header('Location: ' . LOGIN_REGISTER);
        }
    }

    public function addProfile($username) {
        //create first profile
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO personalDetails(firstname, lastname, dob, phone, Username)"
                . " values(:firstname, :lastname, :dob, :phone, :username);");
        $statement->bindValue(':firstname', '');
        $statement->bindValue(':lastname', '');
        $statement->bindValue(':dob', null);
        $statement->bindValue(':phone', '');
        $statement->bindValue(':username', $username);
        $statement->execute();
    }
    
    public function updateProfile() {
        $db = db_connect();
        $statement = $db->prepare("update users u, personalDetails p "
                . "set password = :password, "
                . "     dob = :dob,"
                . "     phone = :phone, "
                . "     firstname = :firstname, "
                . "     lastname = :lastname, "
                . "     email = :email "
                . "where u.username = p.username"
                . " and p.username = :username;");
        $hashPass = password_hash($this->password, PASSWORD_DEFAULT);
        $statement->bindValue('password', $hashPass);
        $statement->bindValue('dob', $this->dob);
        $statement->bindValue('phone', $this->phone);
        $statement->bindValue('firstname', $this->firstname);
        $statement->bindValue('lastname', $this->lastname);
        $statement->bindValue('email', $this->email);
        $statement->bindValue('username', $this->username);
        $statement->execute();
    }

    public function getUser() {
        $db = db_connect();
        $statement = $db->prepare("select * from users u, personalDetails p "
                . "where p.username = :username and u.username = p.username");
        $statement->bindValue("username", $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if($rows){
            $this->email = $rows[0]['Email'];
            $this->firstname = $rows[0]['firstname'];
            $this->lastname = $rows[0]['lastname'];
            $this->dob = $rows[0]['dob'];
            $this->phone = $rows[0]['phone'];
            $this->password = $rows[0]['Password'];
        }
        return $this;
    }
    
    public function report(){
        $db = db_connect();
        $statement = $db->prepare(""
                . " select *
                    from users u
                        join (select Username, count(*) as count from reminders group by Username) as r on u.Username = r.Username 
                        join personaldetails p on u.Username = p.Username 
                        join log l on u.Username = l.Username;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
