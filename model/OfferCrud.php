<?php
namespace Model;
class OfferCrud extends Connection
{

    private $notification;

    public function __construct()
    {
        parent::__construct();
        $this->notification = new Notification();
    }

    public function uploadImage()
    {
        $target_dir = "../assets/styles/dashboard/imag";

        if (isset($_FILES["image"])) {
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                return $target_file;
            } else {
                echo "File is not an image.";
                return false;
            }
        } else {
            echo "No image file uploaded.";
            return false;
        }
    }


    public function createOffer()
    {
        $title = $_POST['title'];
        $description = $_POST['desc'];
        $company = $_POST['company'];
        $location = $_POST['location'];
        $status = $_POST['status'];
        $image_path = $this->uploadImage();
        $user_id = $_POST['user'];
        $sql = $this->conn->prepare("INSERT INTO jobs (title, description,company , location,status,date_created,image_path,user_id) VALUES (?, ?,?,?,?,NOW(),?,?)");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $description);
        $sql->bindParam(3, $company);
        $sql->bindParam(4, $location);
        $sql->bindParam(5, $status);
        $sql->bindParam(6, $image_path);
        $sql->bindParam(7, $user_id);
        $sql->execute();
    }
    public function createUserOffer()
    {
        $description = $_POST['userDescription'];
        $Position = $_POST['position'];

        $sql = $this->conn->prepare("INSERT INTO employee (user_id,job_id,status, employee_description , position) VALUES (1, 1,'active',?,?)");
        $sql->bindParam(1, $description);
        $sql->bindParam(2, $Position);
        $sql->execute();
        header('Location: ../views/userapply.php');
    }

    public function getOffers()
    {
        $stmt = $this->conn->query("SELECT * FROM jobs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getActiveOffers()
    {
        $stmt = $this->conn->query('SELECT * FROM jobs where status = "open"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserOffers()
    {
        $stmt = $this->conn->query("SELECT employee.*,users.username,jobs.company FROM employee JOIN jobs ON employee.user_id = jobs.user_id JOIN users ON users.id = employee.user_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOffer($id, $title, $description)
    {
        $stmt = $this->conn->prepare("UPDATE jobs SET title = ?, description = ? WHERE job_id = ?");
        $stmt->execute([$title, $description, $id]);
        header('Location: ../views/list.php');
    }

    public function deleteOffer($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM jobs WHERE job_id = ?");

        $stmt->execute([$id]);
        header('Location: ../views/list.php');
    }
    public function search($title, $company, $location)
    {
        $sql = "SELECT * FROM jobs WHERE title like concat('%',:title,'%') OR company like concat('%',:company,'%') OR location like concat('%',:location,'%')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':company', $company, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOfferStatus($status, $id)
    {
        try {
            //code...
            $sql = "UPDATE employee SET status = :status WHERE id = :id;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();

            $this->notification->title = "Offer status changed";
            $this->notification->content = "The offer with id " . $id . "has been updated to " . $status;
            $this->notification->save();
            return true;
        } catch (\Throwable $th) {
            die ($th);
        }
    }
}
if (isset($_POST['submit'])) {
    $offerCrud = new OfferCrud();
    $offerCrud->createOffer();
}
if (isset($_POST['submitUser'])) {
    $offerCrud = new OfferCrud();
    $offerCrud->createUserOffer();
}

if (isset($_POST['submitUpdate'])) {
    $offerCrud = new OfferCrud();
    $offerCrud->updateOffer($_POST['idedit'], $_POST['title'], $_POST['desc']);
}
if (isset($_POST['submitDelete'])) {
    $offerCrud = new OfferCrud();
    $id = $_POST['OfferID'];
    $offerCrud->deleteOffer($id);
}
