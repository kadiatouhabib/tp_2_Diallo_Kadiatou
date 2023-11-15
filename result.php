<!-- result.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_result.css">
    <title>Resultat</title>
</head>
<body>
    <a href="index.php">Accueil</a><br>

    <?php
    require_once("functions.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $serverName = 'localhost';
        $username = "root";
        $pwd = "";
        $dbName = "ecom1_tp2";

        $connection = connectToDatabase($serverName, $username, $pwd, $dbName);

        // Sélectionnez les adresses à partir de la base de données
        $stmtSelect = $connection->prepare("SELECT * FROM address");
        $stmtSelect->execute();
        $result = $stmtSelect->get_result();

        echo "<div class='container'>";

        // Affiche chaque adresse
        while ($row = $result->fetch_assoc()) {
            echo "<div class='adresse-result'>";
            echo "<h2>Adresse</h2>";
            echo "<p><strong> Street: </strong> " . htmlspecialchars($row['street']) . "</p>";
            echo "<p><strong> Street_nb: </strong> " . htmlspecialchars($row['street_nb']) . "</p>";
            echo "<p><strong> Type: </strong> " . htmlspecialchars($row['type']) . "</p>";
            echo "<p><strong> City: </strong> " . htmlspecialchars($row['city']) . "</p>";
            echo "<p><strong> Zip Code: </strong> " . htmlspecialchars($row['zipcode']) . "</p>";
            echo "<br>";
            echo "</div>";
        }

        echo "</div>";

        // Ferme la connexion à la base de données
        closeConnection($connection);
    }
    ?>
</body>
</html>
