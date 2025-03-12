<?php
/**
 * @var db $db
 */
require "settings/init.php";

$data = $_POST["data"] ?? [];

// GEMMER RADIO KNAP-VALG KORREKT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["garnStatus"])) {
        $data["garnStatus"] = $_POST["garnStatus"]; // Gemmer radio-knapværdien korrekt
    }
}


$uploadDir = "uploads/"; // Mappen hvor billeder gemmes
$uploadFile = "";
$uploadMessage = "";
$successMessage = "";
$keepOpen = false; // Holder accordion åben ved fejl
$data = $_POST["data"] ?? []; // Bevarer input

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filupload tjek
    if (!empty($_FILES["garnBillede"]["name"])) {
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        $maxFileSize = 2 * 1024 * 1024;
        $fileSize = $_FILES["garnBillede"]["size"];
        $fileExt = strtolower(pathinfo($_FILES["garnBillede"]["name"], PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedTypes)) {
            $uploadMessage = "Fejl: Kun JPG, JPEG, PNG og GIF filer er tilladt.";
        } elseif ($fileSize > $maxFileSize) {
            $uploadMessage = "Fejl: Filen er for stor. Maksimal størrelse er 2MB.";
        } else {
            $fileName = uniqid("garn_", true) . "." . $fileExt;
            $uploadFile = $uploadDir . $fileName;

            if (!move_uploaded_file($_FILES["garnBillede"]["tmp_name"], $uploadFile)) {
                $uploadMessage = "Fejl: Kunne ikke uploade billedet.";
                $uploadFile = "";
            }
        }
    } else {
        $uploadMessage = "Fejl: Du skal uploade et billede.";
    }

    // Hvis der er en fejl, hold accordion åben
    if (!empty($uploadMessage)) {
        $keepOpen = true;
    }
    // Hvis ingen fejl, indsæt data i databasen
    if (empty($uploadMessage) && !empty($_POST["data"])) {
        $garnStatus = isset($data["garnStatus"]) ? $data["garnStatus"] : 0;

        $sql = "INSERT INTO garnlager (garnNavn, garnFarve, garnStrPind, garnStrNaal, garnMateriale, garnStatus, garnAntal, garnBillede) 
                VALUES (:garnNavn, :garnFarve, :garnStrPind, :garnStrNaal, :garnMateriale, :garnStatus, :garnAntal, :garnBillede)";
        $bind = [
            ":garnNavn" => $data["garnNavn"],
            ":garnFarve" => $data["garnFarve"],
            ":garnStrPind" => $data["garnStrPind"],
            ":garnStrNaal" => $data["garnStrNaal"],
            ":garnMateriale" => $data["garnMateriale"],
            ":garnStatus" => $garnStatus,
            ":garnAntal" => $data["garnAntal"],
            ":garnBillede" => $uploadFile
        ];

        $db->sql($sql, $bind, false);
        $successMessage = "Dit garn er nu tilføjet til lageret.";
        $data = []; // Nulstil kun ved succes
        $keepOpen = false; // Fold accordion sammen ved succes
    }
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
<div class="container mt-5 pt-3">
    <div class="row w-100 mb-4">
        <div class="col-12">
            <h1>Dit garnlager</h1>
        </div>
        <div class="col-12">
            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12">
            <div class="accordion" id="addGarn">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button <?= $keepOpen ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tilføj garn til dit lager
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse <?= $keepOpen ? 'show' : '' ?>" data-bs-parent="#addGarn">
                        <div class="accordion-body">

                            <form action="lager.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row g-3 my-2">
                                    <div class="col-12">
                                        <p class="m-0 p-0">Udfyld oplysningerne om dit garn</p>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnNavn" name="data[garnNavn]" placeholder="Garnets navn" value="<?= htmlspecialchars($data["garnNavn"] ?? '') ?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnFarve" name="data[garnFarve]" placeholder="Farve" value="<?= htmlspecialchars($data["garnFarve"] ?? '') ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnMateriale" name="data[garnMateriale]" placeholder="Materiale" value="<?= htmlspecialchars($data["garnMateriale"] ?? '') ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnStrPind" name="data[garnStrPind]" placeholder="Størrelse på strikkepinde" value="<?= htmlspecialchars($data["garnStrPind"] ?? '') ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="garnStrNaal" name="data[garnStrNaal]" placeholder="Størrelse på hæklenål" value="<?= htmlspecialchars($data["garnStrNaal"] ?? '') ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="number" class="form-control" id="garnAntal" name="data[garnAntal]" placeholder="Antal nøgler" value="<?= htmlspecialchars($data["garnAntal"] ?? '') ?>" required>
                                    </div>
                                    <fieldset class="row mt-3">
                                        <legend class="col-form-label col-sm-6 pt-0">Er der brugt noget af garnnøglerne?</legend>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="data[garnStatus]" id="garnStatusJa" value="1"
                                                    <?= isset($data["garnStatus"]) && $data["garnStatus"] === "1" ? 'checked' : '' ?> required>
                                                <label class="form-check-label" for="garnStatusJa">
                                                    Ja
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="data[garnStatus]" id="garnStatusNej" value="0"
                                                    <?= isset($data["garnStatus"]) && $data["garnStatus"] === "0" ? 'checked' : '' ?> required>
                                                <label class="form-check-label" for="garnStatusNej">
                                                    Nej
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div class="col-12">
                                        <label for="formFile" class="form-label">Upload et billede af garnet</label>
                                        <input class="form-control" type="file" id="garnBillede" name="garnBillede">
                                    </div>
                                    <?php if (!empty($uploadMessage)): ?>
                                        <div class="alert alert-danger"><?php echo $uploadMessage; ?></div>
                                    <?php endif; ?>

                                    <div class="col-auto mt-4 mb-2">
                                        <button type="submit" class="btn reg-btn w-100">Tilføj garn til lager</button>
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
        <h2 class="h3">Dét har du på lager</h2>
        <?php
        $sql = "SELECT * FROM garnlager ORDER BY garnId DESC";
        $garnlager = $db->sql($sql);
        foreach($garnlager as $garn) {
            ?>
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-4">
                            <?php if (!empty($garn->garnBillede)) : ?>
                                <img src="<?= htmlspecialchars($garn->garnBillede); ?>" alt="Billede af <?= htmlspecialchars($garn->garnNavn); ?>" class="img-fluid" style="max-width: 200px;">
                            <?php else : ?>
                                <img src="images/intet-billede.png" class="img-fluid" style="max-width: 200px;">
                            <?php endif; ?>
                        </div>
                        <div class="col-8 align-content-center">
                            <p class="p-0 m-0 text-uppercase text-muted fw-light"><small>
                                <?php echo $garn->garnMateriale . ", " . $garn->garnFarve;?>
                                </small></p>
                            <h3 class="h4 mb-3">
                                <?php echo $garn->garnNavn; ?>
                            </h3>
                            <div class="row mb-2">
                                <div class="col-auto">
                                   <img src="images/Ikoner_knitting.png" style="max-width: 15px"> <?php echo $garn->garnStrPind; ?>
                                </div>
                                <div class="col-auto">
                                    <img src="images/Ikoner_chrochet.png" style="max-width: 15px"> <?php echo $garn->garnStrNaal; ?>
                                </div>
                            </div>
                            <div class="text-muted">
                                Antal på lager: <?php echo htmlspecialchars($garn->garnAntal); ?><br>
                                (<?php echo $garn->garnStatus == 0 ? "Åbnet" : "Uåbnet"; ?>)
                            </div>

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