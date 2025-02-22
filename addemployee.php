<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="icon" type="image/x-icon" href="img/favi.svg">
    <title>[clockify] - Auftragnehmer-Firma hinzufügen</title>
</head>

<body>
    <main>
    <header>
        <div class="h1"><a href="index.html">[clockify]</a></div>
        <br>
        <div class="h2">    [clockify] - Auftragnehmer-Firma hinzufügen  </div>
    </header>
<br>

<br>

<div class="vertical-menu">
        <div class="addemployee">
            <form action="addamployee.php" method="post">
        <input type="text" id="query" name="query" placeholder="Suche XYZ">
    </form>

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
            $name = $_POST['name'];
            $adresse = $_POST['adresse'];
            $geberID = $_POST['nehmerID'];
            $IBAN = $_POST['IBAN'];


            $stmt = $pdo->prepare("INSERT INTO auftraggeber (name, adresse, nehmerID, IBAN) VALUES (:auftraggeber, :adresse, :nehmerID, :IBAN)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':nehmerID', $geberID);
            $stmt->bindParam(':IBAN', $IBAN);

            $stmt->execute();

            echo "Auftragnehmer erfolgreich hinzugefügt";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
    ?>


</main>
    
</body>

</html>