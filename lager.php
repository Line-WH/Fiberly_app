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
<div class="container">
    <div class="row w-100">
        <div class="col-12">
            <h1>Dit garnlager</h1>
        </div>

        <div class="col-12">
            <div class="accordion" id="addGarn">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tilføj garn til dit lager
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#addGarn">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-3 w-100">
        <h3>Dét har du på lager</h3>
        <?php
        $sql = "SELECT * FROM garnlager ORDER BY garnNavn ASC";
        $garnlager = $db->sql($sql);
        foreach($garnlager as $garn) {
            ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>
                            <?php
                            echo $garn->garnNavn;
                            ?>
                        </h2>
                    </div>
                    <div class="card-body">
                        <?php
                        echo $garn->garnFarve;
                        ?>
                        <br>
                        Materiale: <?php echo $garn->garnMateriale ?>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>