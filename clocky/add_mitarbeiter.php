<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $geburtsdatum = $_POST['geburtsdatum'];
    $gehaltsgruppe = $_POST['gehaltsgruppe'];
    $arbeitnehmerID = $_POST['arbeitnehmerID'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO mitarbeiter (name, vorname, geburtsdatum, arbeiterID, gehaltsgruppe, nehmerID, adresse) 
            VALUES (:name, :vorname, :geburtsdatum, :arbeiterID, :gehaltsgruppe, :nehmerID, :adresse)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':vorname', $vorname);
    $stmt->bindParam(':geburtsdatum', $geburtsdatum);
    $stmt->bindParam(':arbeiterID', $arbeitnehmerID);    
    $stmt->bindParam(':gehaltsgruppe', $gehaltsgruppe);
    $stmt->bindParam(':nehmerID', $arbeitnehmerID);
    $stmt->bindParam(':adresse', $adresse);

    if ($stmt->execute()) {
        echo "Neuer Mitarbeiter erfolgreich hinzugefügt.";
    } else {
        echo "Fehler beim Hinzufügen des Mitarbeiters.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitarbeiter hinzufügen</title>
</head>
<body>
    <form method="POST">
        <h2>Mitarbeiter hinzufügen</h2>
        Name: <input type="text" name="name" required><br>
        Vorname: <input type="text" name="vorname" required><br>
        Geburtsdatum: <input type="date" name="geburtsdatum" required><br>
        Gehaltsgruppe: <input type="number" name="gehaltsgruppe" required><br>
        Arbeitnehmer-ID: <input type="text" name="arbeitnehmerID" required><br>
        Adresse: <input type="text" name="adresse" required><br>
        <input type="submit" value="Mitarbeiter hinzufügen">
    </form>
</body>
</html>