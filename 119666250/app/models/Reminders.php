<?php

class Reminders {
    public $id;
    public $subject;
    public $description;

    public function __construct() {
        
    }

    public function get_reminders() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE Username = :username AND deleted = 0;");
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

        $statement = $db->prepare("UPDATE reminders SET deleted = 1 WHERE id = :id;");
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
    
    public function updateItem(){
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders "
                . "SET  `subject` = :subject, "
                . "     `description` = :description, "
                . "     `Username` = :username "
                . "WHERE id = :id;");
        $statement->bindValue(':subject', $this->subject);
        $statement->bindValue(':description', $this->description);
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->bindValue(':id', $this->id);
        $statement->execute();
    }

    public function addToTable($username, $subjects, $description) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO reminders "
                . "VALUES(:id, :subjects, :description, :createdDate, :deleted, :username); ");
        $statement->bindValue(':id', null);
        $statement->bindValue(':subjects', $subjects);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':createdDate', date('Y-m-d H:i:s'));
        $statement->bindValue(':deleted', 0);
        $statement->bindValue(':username', $username);
        $statement->execute();
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

        if (!password_verify($password, $hash_pwd)) {
            $attempt = 1;
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
            } else if ($rows) {
                $attempt = $attempt_number + 1;
                $statement = $db->prepare("UPDATE wronglog SET Attempt = :attempt WHERE Username = :user");
                $statement->bindValue(':user', $this->username);
                $statement->bindValue(':attempt', $attempt);
                $statement->execute();
            } else {

                $statement1 = $db->prepare("INSERT INTO wronglog (Username, Attempt)"
                        . "VALUES (:username, :attempt); ");
                $statement1->bindValue(':username', $this->username);
                $statement1->bindValue(':attempt', $attempt);
                $statement1->execute();
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
            $statement = $db->prepare("INSERT INTO users (Username, Password, Email)"
                    . "VALUES (:username, :password, :email ); ");

            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $hashPass);
            $statement->bindValue(':email', $email);
            $statement->execute();

            $_SESSION['auth'] = true;
        } else {
            header('Location: /login/register');
        }
    }

    public function get_amount() {
        $db = db_connect();
        $statement = $db->prepare("SELECT amount FROM tuition WHERE username=:username;");
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);

        return $rows;
    }

}
