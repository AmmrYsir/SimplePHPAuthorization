<?php

class UserModel extends Database {
    
    protected function createUser($username, $password, $repassword, $email) {
        if(empty($username) || empty($password) || empty($repassword) || empty($email)) {
            return 1;
        }
        else if (!checkUsernameValid($username)) {
            return 2;
        }
        else if ($password !== $repassword){
            return 3;
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) && !checkEmailValid($email)){
            return 4;
        }
        else {
            $query = 'INSERT INTO `usertable`(id,username,password,email) VALUES(?,?,?,?)';
            $pdo = $this->conn->connect()->prepare($query);
            $pdo->execute([uniqid(), $username, $password, $email]);
            return true;
        }
    }

    protected function checkUsernameValid($username) {
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

    protected function checkEmailValid($email) {
        $query = 'SELECT email FROM `usertable` WHERE email=?';
        $pdo = $this->conn->connect()->prepare($query);
        $pdo->execute([$email]);

        while ($row = $pdo->fetch()) {
            if ($row['email'] == $email) {
                return false;
            }
        }
        return true;
    }

}