d<?php

class User {

    public $username;
    public $password;
    public $auth = false;
    public $email;
    public $time;
    public $attempt;
    public function __construct() {
        
    }

    public function authenticate() {
        	 
        $db = db_connect();
        $statement = $db->prepare("select Username, Password from users WHERE Username = :name;");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $hash_pwd = $rows[0]['Password'];
        $password = $this->password;

        if (!password_verify($password,$hash_pwd)){
           $attempt = $attempt + 1;
           $_SESSION['report'] = $_SESSION['report'] + 1;
           $db = db_connect();		
           $statement = $db->prepare("INSERT INTO log (Username, Attempt, Time)"
                    . "VALUES (:username, :attempt, :time ); ");
           $statement->bindValue(':username',$this->$username);
           $statement->bindValue(':attempts',$this->$attempt);
           $statement->bindValue(':time',time());
           $statement->execute();
        } else {
           $this->auth = true;
           $_SESSION['username'] = $rows[0]['Username'];
           $_SESSION['password'] = $rows[0]['Password'];
               }

    }

    public function register ($email, $username, $password) {
        if(strlen($password) >= 3){
           $hashPass = password_hash($password, PASSWORD_DEFAULT);     
           $db = db_connect();
           $statement = $db->prepare("INSERT INTO users (Email, Username, Password)"
                    . " VALUES (:email, :username, :password); ");
           $statement->bindValue(':email', $email);
           $statement->bindValue(':username', $username);
           $statement->bindValue(':password', $password);
           $statement->execute();
           $_SESSION['auth'] = true;
        } else {
            header('Location: /login/register');
               }
    }
}  