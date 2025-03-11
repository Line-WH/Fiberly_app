<?php
/**
 * @var db $db
 */

require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    $sql = "INSERT INTO garnlager (garnNavn, garnFarve, garnStrPind, garnStrNaal, garnMateriale, garnStatus, garnAntal) VALUES (:garnNavn, :garnFarve, :garnStrPind, :garnStrNaal, :garnMateriale, :garnAntal, :garnStatus, :garnAntal)";
    $bind = [":garnNavn" => $data["garnNavn"], ":garnFarve" => $data["garnFarve"], ":garnStrPind" => $data["garnStrPind"], ":garnStrNaal" => $data["garnStrNaal"], ":garnMateriale" => $data["garnMateriale"], ":garnStatus" => $data["garnStatus"], ":garnAntal" => $data["garnAntal"]];

    $db->sql($sql, $bind, false);

    echo "Dit garn er nu tilføjet til lageret. <a href='lager.php'>Opret mere</a>";
    exit;
}
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

                            <form action="lager.php" method="post" enctype="multipart/form-data">
                                <div class="row g-3 my-2">
                                    <div class="col-12">
                                        <p class="m-0 p-0">Udfyld oplysningerne om dit garn</p>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnNavn" name="data[garnNavn]" placeholder="Garnets navn">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnFarve" name="data[garnFarve]" placeholder="Farve">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnMateriale" name="data[garnMateriale]" placeholder="Materiale">
                                    </div>
                                    <div class="col-12">
                                        <input type="number" class="form-control" id="garnStrPind" name="data[garnStrPind]" placeholder="Størrelse på strikkepinde">
                                    </div>
                                    <div class="col-12">
                                        <input type="number" class="form-control" id="garnStrNaal" name="data[garnStrNaal]" placeholder="Størrelse på hæklenål">
                                    </div>
                                    <div class="col-12">
                                        <input type="number" class="form-control" id="garnAntal" name="data[garnAntal]" placeholder="Antal nøgler">
                                    </div>
                                    <fieldset class="row mt-3">
                                        <legend class="col-form-label col-sm-6 pt-0">Er der brugt noget af garnnøglerne?</legend>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="garnStatus" id="garnStatusJa" value="1" required>
                                                <label class="form-check-label" for="garnStatusJa">
                                                    Ja
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="garnStatus" id="garnStatusNej" value="0" required>
                                                <label class="form-check-label" for="garnStatusNej">
                                                    Nej
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-12">
                                        <label for="formFile" class="form-label">Upload et billede af garnet</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                    <div class="col-auto mt-4 mb-2">
                                        <button type="submit" class="btn btn-primary w-100">Tilføj garn til lager</button>
                                    </div>
                                </div>
                            </form>
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