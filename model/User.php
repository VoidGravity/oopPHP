<?php

namespace Model;

use __classes\Connection;
use PDO;

class User
{

    public static function findBy($col, $val)
    {
        $sql = (new Connection())->conn->prepare("SELECT * FROM users WHERE " . $col . " = :col");
        $sql->bindParam(":col", $val);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $user = $sql->fetch();
        return $user;
    }

    public static function create($username, $password, $email)
    {
        
            $sql = (new Connection())->conn->prepare("INSERT INTO users (username,password,email,role_name) VALUES (:username,:password,:email,'candidat')");
            $sql->bindParam(":username", $username, PDO::PARAM_STR);
            $sql->bindParam(":password", $password, PDO::PARAM_STR);
            $sql->bindParam(":email", $email, PDO::PARAM_STR);
            if ($sql->execute()) {
                return true;
            } else {
                return false;
            }
        
        // $sql = (new Connection())->conn->prepare("INSERT INTO users (username,password,email,role_name) VALUES (:username,:password,:email,'candidat')");
        // $sql->bindParam(":username", $username, PDO::PARAM_STR);
        // $sql->bindParam(":hash", $password, PDO::PARAM_STR);
        // $sql->bindParam(":email", $email, PDO::PARAM_STR);
        // // if ($sql->execute()) {
        // //     return true;
        // // } else {
        // //     return false;
        // // }
    }
}
