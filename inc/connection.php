<?php

require_once __DIR__.'/../configs/db.config.php';

class Connection
{
    protected $conn;

    public function __construct(){
        try {
            $this->conn = new PDO("mysql:host=". DB_HOST.";dbname=". DB_NAME, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }

}