<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firmenname = $_POST['firmenname'];
    $adresse = $_POST['adresse'];
    $geberID = $_POST['geberID'];
    $iban = $_POST['iban'];

    $sql = "INSERT INTO auftraggeber (name, adresse, geberID, IBAN) 
            VALUES (:name, :adresse, :geberID, :IBAN)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $firmenname);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':geberID', $geberID);
    $stmt->bindParam(':IBAN', $iban);

    if ($stmt->execute()) {
        echo "Neuer Auftraggeber erfolgreich hinzugefügt.";
    } else {
        echo "Fehler beim Hinzufügen des Auftraggebers.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auftraggeber hinzufügen</title>
</head>
<body>
    <form method="POST">
        <h2>Auftraggeber hinzufügen</h2>
        Firmenname: <input type="text" name="name" required><br>
        Adresse: <input type="text" name="adresse" required><br>
        Auftraggeber-ID: <input type="number" name="geberID" required><br>
        IBAN: <input type="text" name="iban" required><br>
        <input type="submit" value="Auftraggeber hinzufügen">
    </form>
</body>
</html>