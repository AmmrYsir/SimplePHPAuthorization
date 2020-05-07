<?php

class UserController extends UserModel {
    
    public function Register($username, $password, $repassword, $email) {
        return $this->createUser($username, $password, $repassword, $email);
    }

}