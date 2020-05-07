<?php

class UserModel extends Database {
    
    protected function createUser($username, $password, $repassword, $email) {
        if(empty($username) || empty($password) || empty($repassword) || empty($email)) {
            return 1;
        }
        else if (checkUsername($username)) {
            return 2;
        }
        else if ($password !== $repassword){
            return 3;
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 4;
        }
        else {
            $query = 'INSERT INTO `usertable`(id,username,password,email) VALUES(?,?,?,?)';
            $pdo = $this->conn->connect()->prepare($query);
            $pdo->execute([uniqid(), $username, $password, $email]);
            return true;
        }
    }

    protected function checkUsername($username) {
        $query = 'SELECT username FROM `usertable` WHERE username=?';
        $pdo = $this->conn->connect()->prepare($query);
        $pdo->execute([$username]);

        while ($row = $pdo->fetch()) {
            if ($row['username'] == $username) {
                return false;
            }
        }
        return true;
    }

}