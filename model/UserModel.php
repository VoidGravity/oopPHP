<?php


namespace App\Models;

class UserModel
{
    private $db;

    

    public function getAllUsers()
    {
        // Fetch data from the "users" table
        $result = $this->db->query("SELECT * FROM users");
        
        // Check for errors
        if (!$result) {
            die("Error: " . $this->db->error);
        }

        // Fetch data as an associative array
        $users = $result->fetch_all(MYSQLI_ASSOC);
       
        return $users;
    }
}
?>