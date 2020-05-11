<?php

class UserController extends UserModel {
    
    public function Register($username, $password, $repassword, $email) {
        if(empty($username) || empty($password) || empty($repassword) || empty($email)) {
            $Empty = true;
        }
        else if ($this->checkUsernameValid($username) === false) {
            $usernameNoValid = true;
        }
        else if ($password !== $repassword){
            $passwordRepeatNoValid = true;
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) && $this->checkEmailValid($email) === false){
            $emailNoValid = true;
        }
        else {
            $this->createUser($username, $password, $repassword, $email);
            return true;
        }
    }

    public function Login($username, $password) {
        return $this->checkUser($username, $password);
    }

}