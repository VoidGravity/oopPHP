<?php


if (isset($_POST['search'])) {
    $kayword = $_POST["kayword"];
    $location = $_POST["location"];
    $company = $_POST["company"];

    $offerCrud = new OfferCrud();

    $searchResults = $offerCrud->search($kayword, $company, $location);

    if ($searchResults) {
        echo json_encode($searchResults);
    } else {
        echo 404;
    }
}
