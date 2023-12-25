<?php

namespace Model;

use __classes\Connection;
use PDO;

class Notification
{

    public static function get()
    {
        $stmt = (new Connection())->conn->query("SELECT * FROM notifications");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($title, $content)
    {
        $sql = "INSERT INTO `notifications`(`title`, `content`) VALUES (:title, :content)";
        $stmt = (new Connection())->conn->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
