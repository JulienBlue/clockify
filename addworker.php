<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="icon" type="image/x-icon" href="img/favi.svg">
    <title>[clockify] - Mitarbeiter hinzufügen</title>
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
        <div class="Mitarbeiter hinzufügen">


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
            $vorname = $_POST['vorname'];
            $geburtsdatum  = $_POST['geburtsdatum'];
            $arbeiterID = $_POST['arbeiterID'];
            $gehaltsgruppe = $_POST['gehaltsgruppe'];
            $nehmerID = $_POST['nehmerID'];

            $stmt = $pdo->prepare("INSERT INTO mitarbeiter (name, geburtsdatum, arbeiterID, gehaltsgruppe, nehmerID) VALUES (:name, :geburtsdatum, :arbeiterID, :gehaltsgruppe, :nehmerID)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':vorname', $vorname);
            $stmt->bindParam(':geburtsdatum', $geburtsdatum);
            $stmt->bindParam(':arbeiterID', $arbeiterID);
            $stmt->bindParam(':gehaltsgruppe', $gehaltsgruppe);
            $stmt->bindParam(':nehmerID', $nehmerID);

            $stmt->execute();

            echo "Mitarbeiter erfolgreich hinzugefügt";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
    ?>


</main>
    
</body>

</html>