<?php
    $attempts = 1;
    $db = db_connect();
    $statement = $db->prepare("select * from log WHERE Username = :name;");
    $statement->bindValue(':name',$_SESSION['username']);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($rows){
        $attempt_number = $rows[0]['Attempt'];
        $attempts = $attempt_number + 1;
        $statement = $db->prepare("UPDATE log SET Attempt = :attempt WHERE Username = :user");
        $statement->bindValue(':user', $_SESSION['username']);
        $statement->bindValue(':attempt', $attempts);
        $statement->execute();
    } else {
       $statement1 = $db->prepare("INSERT INTO log (Username, Attempt)"
                . "VALUES (:username, :attempt); ");
       $statement1->bindValue(':username',$_SESSION['username']);
       $statement1->bindValue(':attempt', $attempts);
       $statement1->execute();
    }
			
session_destroy();
header ('location:/');

?> 