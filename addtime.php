<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="icon" type="image/x-icon" href="img/favi.svg">
    <title>[clockify] - Zeiterfassung</title>
</head>

<body>
    <main>
    <header>
        <div class="h1"><a href="index.html">[clockify]</a></div>
        <br>
        <div class="h2">    [clockify]  </div>
    </header>
<br>

<br>

<div class="vertical-menu">
        </div>
    </div>

    <?php
    $host = '127.0.0.1';
    $dbname = 'clockify';
    $username = 'root';
    $password = '1234';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $geberID = $_POST['geberID'];
            $einsatzort  = $_POST['einsatzort'];
            $nehmerID = $_POST['nehmerID'];
            $arbeiterID = $_POST['arbeiterID'];
            $datum = $_POST['datum'];
            $zeitAnfang = $_POST['zeitAnfang'];
            $zeitEnde = $_POST['zeitEnde'];
            $einsatzID = $_POST['einsatzID'];
            $lohn = $_POST['lohn'];
            $signed = $_POST['signed'];

            $stmt = $pdo->prepare("INSERT INTO arbeitszeiten (geberID, einsatzort, nehmerID, arbeiterID, datum, zeitAnfang, zeitEnde, einsatzID, lohn, signed) VALUES (:auftraggeber, :einsatzort, :nehmerID, :arbeiterID, :datum, :zeitAnfang, :zeitEnde, :einsatzID, :lohn, :signed)");

            $stmt->bindParam(':auftraggeber', $auftraggeber);
            $stmt->bindParam(':einsatzort', $einsatzort);
            $stmt->bindParam(':nehmerID', $nehmerID);
            $stmt->bindParam(':arbeiterID', $einsatzort);
            $stmt->bindParam(':datum', $datum);
            $stmt->bindParam(':zeitAnfang', $zeitAnfang);
            $stmt->bindParam(':zeitEnde', $zeitEnde);
            $stmt->bindParam(':einsatzID', $einsatzID);
            $stmt->bindParam(':lohn', $lohn);
            $stmt->bindParam(':Std', $Std);
            $stmt->bindParam(':signed', $signed);

            $stmt->execute();

            echo "Zeiterfassung erfolgreich hinzugefügt";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
    ?>


</main>
    
</body>

</html>