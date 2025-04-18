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



    <div class="card mb-3 m-3 mt-3 p-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body d-flex align-items-center">
                    <img src="images/profil_alice.jpg" class="profile-img">
                    <label for="exampleFormControlInput1" class="form-label"></label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Hvad har du på hjertet?">
                </div>
            </div>
        </div>
    </div>

    <br>

    </div>
    <div class="card mb-3 m-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="images/fælleskab1.jpg" class="img-fluid rounded-start" alt="baby knit">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <img src="images/profil-bente.jpg" class="profile-img"> <h5 class="card-title">Bente</h5>
                    <p class="card-text">Se hvad jeg har lavet til mit barnebarn</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-mahogany text-mesa"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"> Kommenter / like
        </button>
    </div>
    <br>
    <br>


    <div class="card mb-3 m-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="images/fælleskab%202.jpg" class="img-fluid rounded-start" alt="hvor mange grader">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <img src="images/Pia-fællesskab.jpg" class="profile-img"> <h5 class="card-title">Pia</h5>
                    <p class="card-text">Nogen der ved hvor mange grander man må vaske dette garn på?</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 25 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-mahogany text-mesa"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"> Kommenter / like
        </button>
    </div>

    <br>
    <br>
    <div class="card mb-3 m-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="images/fælleskab3.jpg" class="img-fluid rounded-start" alt="hvor mange grader">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <img src="images/profil-marianne.jpg" class="profile-img"> <h5 class="card-title">Marianne</h5>
                    <p class="card-text">Se lige en fin bøllehat jeg har hæklet - jeg har brugt denne opsktift?</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 45 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-mahogany text-mesa"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"> Kommenter / like
        </button>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
