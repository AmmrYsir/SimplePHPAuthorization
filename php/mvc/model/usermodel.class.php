<?php

class UserModel extends Database {
    
    protected function createUser($username, $password, $repassword, $email) {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO `usertable`(username,password,email) VALUES(?,?,?)';
        $pdo = $this->connect()->prepare($query);
        $pdo->execute([$username, $passwordHashed, $email]);
        return true;
    }

    protected function checkUser($username, $password) {
        $query = 'SELECT * FROM `usertable` WHERE username=?';
        $pdo = $this->connect()->prepare($query);
        $pdo->execute([$username]);

        while($row = $pdo->fetch()) {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['id'] = $row['id'];
                return true;
            }
        }
        return false;
    }


























    // Minor function
    protected function checkUsernameValid($username) {
        $query = 'SELECT username FROM `usertable` WHERE username=?';
        $pdo = $this->connect()->prepare($query);
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
        $pdo = $this->connect()->prepare($query);
        $pdo->execute([$email]);

        while ($row = $pdo->fetch()) {
            if ($row['email'] == $email) {
                return false;
            }
        }
        return true;
    }

}