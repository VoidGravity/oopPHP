<?php 

namespace Model;

use __classes\Connection;
use PDO;

class Job{

    public static function getOpenJobs()
    {
        $stmt = (new Connection())->conn->query('SELECT * FROM jobs where status = "open"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getApprovedJobs()
    {
        $stmt = (new Connection())->conn->query('SELECT * FROM jobs where status = "approved"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get()
    {
        $stmt = (new Connection())->conn->query('SELECT * FROM jobs');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}