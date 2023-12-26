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
    public static function search($kayword, $location, $company)
    {
        $sql = "SELECT * FROM jobs WHERE title like concat('%',:title,'%') OR company like concat('%',:company,'%') OR location like concat('%',:location,'%')";
        $stmt = (new Connection())->conn->prepare($sql);
        $stmt->bindParam(':title', $kayword, PDO::PARAM_STR);
        $stmt->bindParam(':company', $company, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}