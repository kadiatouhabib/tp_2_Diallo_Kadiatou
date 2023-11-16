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
    // Configurer l'affichage des erreurs
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("functions.php");
   

    // Vérifier si la requête est de type POST et si l'indice "addressCount" est défini
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addressCount"])) {
        $addressCount = $_POST["addressCount"];

        // Connexion à la base de données
        $serverName = 'localhost:3306';
        $username = "root";
        $pwd = "";
        $dbName = "ecom1_tp2";

        $connection = connectToDatabase($serverName, $username, $pwd, $dbName);

        echo "<div class='container'>";

        // Boucle pour afficher chaque adresse saisie
        for ($i = 1; $i <= $addressCount; $i++) {
            echo "<div class='adresse-result'>";
            echo "<h2>Adresse $i</h2>";

            // Vérifier si les données ont été saisies
            if (isset($_POST["street_$i"])) {
                $street = $_POST["street_$i"];
                $street_nb = $_POST["street_nb_$i"];
                $type = $_POST["type_$i"];
                $city = $_POST["city_$i"];
                $zipcode = $_POST["zipcode_$i"];

                // Afficher les données
                echo "<p><strong> Street: </strong> " . htmlspecialchars($street) . "</p>";
                echo "<p><strong> Street_nb: </strong> " . htmlspecialchars($street_nb) . "</p>";
                echo "<p><strong> Type: </strong> " . htmlspecialchars($type) . "</p>";
                echo "<p><strong> City: </strong> " . htmlspecialchars($city) . "</p>";
                echo "<p><strong> Zip Code: </strong> " . htmlspecialchars($zipcode) . "</p>";
                echo "<br>";
            }
            echo "</div>";
        }

        echo "</div>";

       

        // Connexion à la base de données pour l'insertion
        $connectionInsert = connectToDatabase($serverName, $username, $pwd, $dbName);

        // Préparer la déclaration SQL pour l'insertion
        $stmt = prepareStatement($connectionInsert, "INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");

        // Lie les paramètres à la déclaration SQL
        bindParameters($stmt, 'sisss', $street, $street_nb, $type, $city, $zipcode);

        // Boucle pour insérer les données dans la base de données
        for ($i = 1; $i <= $addressCount; $i++) {
            if (isset($_POST["street_$i"])) {
                $street = $_POST["street_$i"];
                $street_nb = $_POST["street_nb_$i"];
                $type = $_POST["type_$i"];
                $city = $_POST["city_$i"];
                $zipcode = $_POST["zipcode_$i"];

                // Exécuter la déclaration SQL
                executeStatement($stmt);
            }
        }

        // Fermer la déclaration SQL
        closeStatement($stmt);

        // Fermer la connexion à la base de données
        closeConnection($connectionInsert);
    } else {
        echo "<p>Erreur : Les données du formulaire ne sont pas correctement définies.</p>";
    }
    ?>
</body>
</html>
