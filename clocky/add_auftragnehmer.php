<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firmenname = $_POST['firmenname'];
    $adresse = $_POST['adresse'];
    $auftragnehmerID = $_POST['auftragnehmerID'];
    $iban = $_POST['iban'];

    $sql = "INSERT INTO auftragnehmer (name, adresse, nehmerID, IBAN) 
            VALUES (:name, :adresse, :nehmerID, :iban)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $firmenname);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':nehmerID', $auftragnehmerID);
    $stmt->bindParam(':iban', $iban);

    if ($stmt->execute()) {
        echo "Neuer Auftragnehmer erfolgreich hinzugefügt.";
    } else {
        echo "Fehler beim Hinzufügen des Auftragnehmers.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auftragnehmer hinzufügen</title>
</head>
<body>
    <form method="POST">
        <h2>Auftragnehmer hinzufügen</h2>
        Firmenname: <input type="text" name="name" required><br>
        Adresse: <input type="text" name="adresse" required><br>
        Auftragnehmer-ID: <input type="number" name="nehmerID" required><br>
        IBAN: <input type="text" name="IBAN" required><br>
        <input type="submit" value="Auftragnehmer hinzufügen">
    </form>
</body>
</html>