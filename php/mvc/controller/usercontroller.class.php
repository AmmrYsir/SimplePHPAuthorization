<?php

class UserController extends UserModel {
    
    public function Register($username, $password, $repassword, $email) {
        if(empty($username) || empty($password) || empty($repassword) || empty($email)) {
            return 1;
        }
        else if ($this->checkUsernameValid($username) === false) {
            return 2;
        }
        else if ($password !== $repassword){
            return 3;
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) && $this->checkEmailValid($email) === false){
            return 4;
        }
        else {
            $this->createUser($username, $password, $repassword, $email);
            return true;
        }
    }

    public function Login($username, $password) {
        $pdo = $this->checkUser($username, $password);
        while($row = $pdo->fetch()) {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['id'] = $row['id'];
                return true;
            }
        }
        return false;
    }



    
}