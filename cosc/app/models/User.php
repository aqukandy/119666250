<?php

class User {

    public $username;
    public $password;
    public $auth = false;
    public $email;
    public $attempt;
    public $time;

    public function __construct() {
        
    }

    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */
	$db = db_connect();
        $statement = $db->prepare("select Username, Password from users WHERE Username = :name;");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	$hash_pwd = $rows[0]['Password'];
	$password = $this->password;
		
        if (!password_verify($password,$hash_pwd)){
            $attempt = 1;
            $statement = $db->prepare("select * from log WHERE Username = :name;");
            $statement->bindValue(':name', $this->username);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($rows){
            $attempt_num_data = $rows[0]['Attempts'];
            //echo $att_num_data; die;
            $attempt = $attempt_num_data + 1;
            $statement = $db->prepare("UPDATE log SET Attempts = :attempt WHERE Username = :user");
            $statement->bindValue(':user', $this->username);
            $statement->bindValue(':attempt', $attempt);
            $statement->execute();

       } else {
            $statement1 = $db->prepare("INSERT INTO log (Username, Attempts)"
                    . "VALUES (:username, :attempts); ");
            $statement1->bindValue(':username', $this->username);
            $statement1->bindValue(':attempt',	$attempt);
            $statement1->execute();
               }
            $this->auth = false;
	
	} else {
            $this->auth = true;
            $_SESSION['username'] = $rows[0]['Username'];
            $_SESSION['password'] = $rows[0]['Password'];
               }
    }
    public function register ($username, $password, $email) {
	if(strlen($password) >= 3){			
            $hashPass = password_hash($password, PASSWORD_DEFAULT);	
            $db = db_connect();
            $statement = $db->prepare("INSERT INTO users (Email, Username, Password)"
			. "VALUES (:email, :username, :password); ");
            $statement->bindValue(':email', 	$email);
            $statement->bindValue(':username',	$username);
            $statement->bindValue(':password',	$hashPass);
            $statement->execute();
            $_SESSION['auth'] = true;
	} else {
            header('Location: /login/register');
               }
    }
}