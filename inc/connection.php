<?php
class Connection
{
    var $host;
    var $username;
    var $password;
    var $database;
    var $conn;


    function __construct($h, $u, $p, $d)
    {
        $this->host = $h;
        $this->username = $u;
        $this->password = $p;
        $this->database = $d;
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function makeConnection()
    {
        return $this->conn;
    }
}
$database = new Connection("localhost", "root", "", "jobez");
$conn = $database->makeConnection();
