<?php
require "settings/init.php";

if(!empty($_POST["data"])) {
    $data = $_POST["data"];
    $dato = $_POST["dato"];
    $tid = $_POST["tid"];

    $datetime = $dato .''. $tid;
    $data["datetime"] = $datetime;

    $sql = "SELECT * FROM bordbooking(bokNames, bokEmail, bokTlf, bokAntal, bokDate, bokTime, bokAarsag) VALUES(:bokNames, :bokEmail, :bokTlf, :bokAntal, :bokDate, :bokTime, :bokAarsag)";
    $bind = [":bokNames" => $data["bokNames"], ":bokEmail" => $data["bokEmail"], ":bokTlf" => $data["bokTlf"], ":bokAntal" => $data["bokAntal"], ":bokDate" => $data["bokDate"], ":bokTime" => $data["bokTime"], ":bokAarsag" => $data["bokAarsag"]];

    $db->sql($sql, $bind, false);

    echo "Du har nu booket bord, tak for din bestilling, vi værdsætter det højt. <a href='forside.html'>Tilbage til forsiden<a/>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Hotel Strandparken Restaurant</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/bd6ccfb77e.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Antique&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f4f0e6;
        }
    </style>



</head>

<body>

<div class="container mt-5 bg-warning">
    <form action="index.php" method="post">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label for="bokNames" class="form-label">Navn</label>
                <input type="text" class="form-control" id="bokNames" name="data[bokNames]" placeholder="Indtast dit navn"
                       value="">
            </div>
            <div class="col-12 col-md-6">
                <label for="bokEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="bokEmail" name="data[bokEmail]"
                       placeholder="Indtast din Email" value="">
            </div>
            <div class="col-12">
                <label for="bokTlf" class="form-label">Mobilnummer</label>
                <textarea class="form-control" name="data[bokTlf]" id="bokTlf" placeholder="Indtast dit mobilnummer"></textarea>
            </div>

            <div class="col-12">
                <label for="bokAntal" class="form-label">Antal mennesker</label>
                <textarea class="form-control" name="data[bokAntal]" id="bokAntal" placeholder="Indtast dit antal mennesker"></textarea>
            </div>

            <div class="mb-3">
                <label for="bokDate">Bestil tid</label>
                <input type="date" id="bokDate" class="form-control">
            </div>

            <div class="mb-3">
                <label for="bokTime">Bestil tid</label>
                <input type="time" id="bokTime" class="form-control">
            </div>

            <div class="col-12">
                <label for="bokAarsag" class="form-label">Årsag</label>
                <textarea class="form-control" name="data[bokAarsag]" id="bokAarsag" placeholder="Årsag (fx. Fødselsdag eller møde)"></textarea>
            </div>

            <div class="col-12 col-md-4 offset-md-8">
                <button type="submit" class="btn btn-primary w-100">Book</button>
            </div>
        </div>
    </form>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>