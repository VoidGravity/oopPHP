<?php

require_once __DIR__ . "/../configs/app.config.php";
require_once __DIR__ . "/../model/OfferCrud.php";

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $status = $_GET["status"];

    $offerCrud = new OfferCrud();

    $reslut = $offerCrud->updateOfferStatus($status,$id);

    header('Location: ' . ABS_URL . '/views/offre.php'); 
}
