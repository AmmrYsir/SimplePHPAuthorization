<?php

class UserModel extends Database {
    
    public function createUser($username, $password, $repassword, $email) {
        if(empty($username) || empty($password) || empty($repassword) || empty($email)) {
            return 1;
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
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

}