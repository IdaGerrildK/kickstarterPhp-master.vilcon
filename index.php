<?php
require "settings/init.php";

if(!empty($_POST["data"])) {
    $data = $_POST["data"];


    $sql = "INSERT INTO billetkoeb(bilNames, bilEmail, bilTlf, bilAntal) VALUES(:bilNames, :bilEmail, :bilTlf, :bilAntal)";
    $bind = [":bilNames" => $data["bilNames"], ":bilEmail" => $data["bilEmail"], ":bilTlf" => $data["bilTlf"], ":bilAntal" => $data["bilAntal"]];

    $db->sql($sql, $bind, false);

    echo "Du har nu booket billett(er) <a href='alle.html'>Tilbage til forsiden<a/>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>VISIT</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/bd6ccfb77e.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">


</head>

<body>

<a href="alle.html"><i class="fa-solid fa-house home text-hjemmegron m-2"></i></a>

<div class="container d-flex justify-content-center align-items-center mb-5">
    <a href="knapper.html"><img src="pic/logofeardiglille.png" alt="logo"></a>
</div>

<div class="container mt-5 bg-grundfarve">
    <form action="insert.php" method="post">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label for="bilNames" class="form-label">Navn</label>
                <input type="text" class="form-control" id="bilNames" name="data[bilNames]" placeholder="Indtast dit navn"
                       value="">
            </div>
            <div class="col-12 col-md-6">
                <label for="bilEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="bilEmail" name="data[bilEmail]"
                       placeholder="Indtast din Email" value="">
            </div>
            <div class="col-12">
                <label for="bilTlf" class="form-label">Mobilnummer</label>
                <textarea class="form-control" name="data[bilTlf]" id="bilTlf" placeholder="Indtast dit mobilnummer"></textarea>
            </div>

            <div class="col-12">
                <label for="bilAntal" class="form-label">Antal mennesker</label>
                <textarea class="form-control" name="data[bilAntal]" id="bilAntal" placeholder="Indtast dit antal mennesker"></textarea>
            </div>

            <div class="col-12 col-md-4 offset-md-8">
                <button type="submit" class="btn btn-hjemmegron w-100">Opret</button>
            </div>
        </div>
    </form>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>