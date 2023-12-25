<?php

session_start();

require_once __DIR__."/../inc/connection.php";

class Auth extends Connection{

    private $email;
    private $username;
    private $password;
    private $passCheckRgex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";


    


    public function login($username, $password){
        
        $sql = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $sql->bindParam(":username", $username, PDO::PARAM_STR);
        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_OBJ);
        $user = $sql->fetch();
        
        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->setSessionParam('username',$username);
                $this->setSessionParam('role',$user->role_name);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function register($username, $password,$password2, $email){
        if (preg_match($this->passCheckRgex, $password) && $password === $password2) {

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $email = $_POST['email'];

            $sql = $this->conn->prepare("INSERT INTO users (username,password,email,role_name) VALUES (:username,:hash,:email,'candidat')");
            $sql->bindParam(":username", $username, PDO::PARAM_STR);
            $sql->bindParam(":hash", $hash, PDO::PARAM_STR);
            $sql->bindParam(":email", $email, PDO::PARAM_STR);
            if ($sql->execute()) {
                echo 'Registration successful!';
                return true;
            } else {
                echo 'Registration failed!';
                return false;
            }
        } else {
            die("Invalid password");
        }
    }

    public function logout(){
        return $this->clearSession();
    }

}