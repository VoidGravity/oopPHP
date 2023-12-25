<?php

namespace __classes;

use PDO;
use PDOException;

class Connection
{
    public $conn;

    public function __construct(){
        try {
            $this->conn = new PDO("mysql:host=". DB_HOST.";dbname=". DB_NAME, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }
}