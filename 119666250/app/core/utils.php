<?php

class Util {

    public static function getLastLoggedDate() {
        $db = db_connect();
        $statement = $db->prepare(" SELECT * "
                . "                 FROM `log` "
                . "                 WHERE username = :username;");
        $statement->bindValue(':username', $_SESSION['username']);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows[0]['Time'];
    }
    
    public static function getAttempts(){
        $currentDate = date('Y-m-d');
        $start = $currentDate . ' 00:00:00';
        $end = $currentDate . ' 23:59:59';
        $db = db_connect();
        $statement = $db->prepare(" SELECT sum(Attempt) as attempt "
                . "                 from `log` "
                . "                 where :start < `Time` and `Time` < :end"
                . "                 group by Username;");
        $statement->bindValue(':start', $start);
        $statement->bindValue(':end', $end);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $attempt = 0;
        
        foreach($rows as $row){
            $attempt += (int)$row['attempt'];
        }
        return $attempt;
    }
}
