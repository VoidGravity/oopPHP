<?php

session_start();

require_once __DIR__ . "/../inc/connection.php";

class Notification extends Connection
{

    public $id;
    public $title;
    public $content;


    public function save()
    {
        $sql = "INSERT INTO `notifications`(`title`, `content`) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getNotifications()
    {
        $stmt = $this->conn->query("SELECT * FROM notifications");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}