<?php
/**
 * @var db $db
 */

require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Fiberly</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="./css/styles.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-mesa">
<?php
include("includes/header.php");
include("includes/navmenu.php");
?>


<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="images/projekter4.jpg" class="card-img-top" alt="biled1">
                <div class="card-body">
                    <h5 class="card-title">Grøn ynglings sweater</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="images/projekter3.jpg" class="card-img-top" alt="billed2">
                <div class="card-body">
                    <h5 class="card-title">Forårs sweater</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="images/projekter5.jpg" class="card-img-top" alt="billed3">
                <div class="card-body">
                    <h5 class="card-title">Sofa tæppe</h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <h4 class="text-mahogany text-center">-Forårs sweater-</h4>
    <br>
    <br>
    <div class="container d-flex justify-content-center">
        <ul class="list-group">
            <li class="list-group-item text-mahogany py-4 rounded">Amigo chunky</li>
            <br>
            <li class="list-group-item text-mahogany py-4 rounded">Pindestørrelse: <br> 7mm</li>
            <br>
            <li class="list-group-item text-mahogany py-4 rounded">Du er nået hertil: <br> Række 27</li>
        </ul>
    </div>
    <br>
    <br>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

