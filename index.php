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
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
    include("includes/header.php");
    include("includes/navmenu.php");
    ?>

    <div class="container ">
        <div class="row">
            <div class="col">
                <section class="welcome-box pt-5 pb-2 text-center shadow-sm">
                    <h2> Velkommen Alice </h2>
                </section>

                <section class="mt-3">
                    <div class="continue-card">
                        <h3> Fortsæt fra hvor du slap </h3>
                        <a href="projekter.php">
                            <img src="images/projekter1.jpg" class="img-fluid rounded" alt="">
                        </a>
                    </div>
                </section>

                <section class="mt-3">
                    <h3> Catch up med dit fællesskab </h3>
                    <div id="communityCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="faellesskab.php">
                                    <img src="images/fælleskab3.jpg" class=" img-fluid rounded" alt="">
                                    <div class="carousel-caption p-2 text-sandstone bg-cinnamon rounded"> Marianne har postet et billed! </div>
                                </a>
                            </div>

                            <div class="carousel-item">
                                <a href="faellesskab.php">
                                    <div class="carousel-caption p-2 text-sandstone bg-cinnamon rounded"> Bente har postet en update! </div>
                                    <img src="images/fælleskab1.jpg" class=" img-fluid rounded" alt="">

                                </a>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#communityCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#communityCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </section>

                <section class="mt-3">
                    <h3> Lær mere </h3>
                    <!-- lær mere containers her -->
                </section>

                <section class="mt-3">
                    <h3> Prøv vores nye garn-beregner </h3>
                    <div class="row">
                        <div class="col text-center mt-2">
                            <button class="btn btn-cinnamon text-sandstone"> Beregn garnforbrug </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
