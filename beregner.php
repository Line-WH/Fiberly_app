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

<body class="bg-mesa">
<?php
include("includes/header.php");
?>

    <div class="container">
        <h2 class="text-center m-3">Garnberegner</h2>
        <div class="card p-4 shadow bg-mahogany text-sandstone">
            <form id="garnForm">
                <div class="mb-3">
                    <label class="form-label">Projektbredde (cm):</label>
                    <input type="number" class="form-control" id="bredde" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Projektlængde (cm):</label>
                    <input type="number" class="form-control" id="laengde" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Masker pr. 10 cm:</label>
                    <input type="number" class="form-control" id="maskerPer10cm" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rækker pr. 10 cm:</label>
                    <input type="number" class="form-control" id="raekkerPer10cm" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meter garn pr. nøgle:</label>
                    <input type="number" class="form-control" id="meterPerNoegle" required>
                </div>
                <button type="submit" class="btn btn-cinnamon text-sandstone w-100">Beregn garnforbrug</button>
            </form>
        </div>

        <div class="mt-4 text-center">
            <h4>Resultat:</h4>
            <p id="resultat" class="fw-bold"></p>
        </div>
    </div>

    <br>
    <br>

<?php

    include("includes/navmenu.php");
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    document.getElementById("garnForm").addEventListener("submit", function(event) {
        event.preventDefault();

        // Hent brugerens input
        const bredde = parseFloat(document.getElementById("bredde").value);
        const laengde = parseFloat(document.getElementById("laengde").value);
        const maskerPer10cm = parseFloat(document.getElementById("maskerPer10cm").value);
        const raekkerPer10cm = parseFloat(document.getElementById("raekkerPer10cm").value);
        const meterPerNoegle = parseFloat(document.getElementById("meterPerNoegle").value);

        console.log(bredde);

        // Sikrer at input er gyldigt
        if (isNaN(bredde) || isNaN(laengde) || isNaN(maskerPer10cm) || isNaN(raekkerPer10cm) || isNaN(meterPerNoegle) || meterPerNoegle <= 0) {
            document.getElementById("resultat").innerText = "Indtast venligst gyldige tal.";
            return;
        }

        // Konverter fra cm til 10 cm (da strikkefasthed ofte gives pr. 10 cm)
        const maskerPerCm = maskerPer10cm / 10;
        const raekkerPerCm = raekkerPer10cm / 10;

        // Beregn det samlede antal masker
        const totalMasker = (bredde * laengde) * (maskerPerCm * raekkerPerCm);

        // Estimeret garnforbrug i meter (1.1 meter pr. 100 masker er et gennemsnit)
        const totalMeter = (totalMasker / 100) * 1.1;

        // Beregn antal garnnøgler og rund op
        const noeglerNødvendigt = Math.ceil(totalMeter / meterPerNoegle);

        // Vis resultat
        document.getElementById("resultat").innerText = `Du skal bruge cirka ${noeglerNødvendigt} nøgle(r) garn.`;
    });

</script>

</body>

</html>