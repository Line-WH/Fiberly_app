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
                        <img src="images/projekter1.jpg" class="img-fluid" alt="">
                    </div>
                </section>

                <section class="mt-3">
                    <h3> Catch up med dit fællesskab </h3>
                    <div class="row">
                        <!-- Karusel her-->

                    </div>
                </section>

                <section class="mt-3">
                    <h3> Lær mere </h3>
                    <!--links til lær her-->
                    <div class="row">
                        <div class="col-6">
                            <div class="learn-gallery">

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
