<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form1.css">
    <title> Formulaire 2 </title>
</head>
<body>
    
</body>
</html>
<a href="index.php">Retour </a>

<?php

// Inclut les fichiers de fonctions 
require_once("functions.php");
require_once("form_1.php");

// infos de connexion à la db
$serverName = 'localhost:3306';
$username = "root";
$pwd = "";
$dbName = "ecom1_tp2";

//  connexion à la db
$connection = connectToDatabase($server_name, $user_name, $pwd, $BaseDonnees_name);

// Vérifie si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prépare la déclaration SQL pour l'insertion
    $stmt = prepareStatement($connection, "INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");

    // Initialisation des variables pour les champs 
    $street = "";
    $street_nb = 0;
    $type = "";
    $city = "";
    $zipcode = "";

    // Liaison des paramètres à la déclaration SQL
    bindParameters($stmt, 'sisss', $street, $street_nb, $type, $city, $zipcode);

    // insertion des donnees dans la db
    for ($i = 1; $i <= $addressCount; $i++) {
        if (isset($_POST["street_$i"])) {
            $street = $_POST["street_$i"];
            $street_nb = $_POST["street_nb_$i"];
            $type = $_POST["type_$i"];
            $city = $_POST["city_$i"];
            $zipcode = $_POST["zipcode_$i"];

            // Exécution la déclaration SQL
            executeStatement($stmt);
        }
    }

    // Fermeture de la déclaration SQL
    closeStatement($stmt);
}

// Fermeture de la connexion à la db
closeConnection($connection);

// Vérifie à nouveau si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Affiche les résultats dans une div avec la classe 'container'
    echo "<div class='container'>";

    // Boucle pour afficher chaque adresse saisie
    for ($i = 1; $i <= $addressCount; $i++) {
        echo "<div class='adresse-result'>";
        echo "<h2>Adresse $i</h2>";

        // Vérifie si les données ont été saisies
        if (isset($_POST["street_$i"])) {
            echo "<p><strong> Street: </strong> " . htmlspecialchars($_POST["street_$i"]) . "</p>";
            echo "<p><strong> Street_nb: </strong> " . htmlspecialchars($_POST["street_nb_$i"]) . "</p>";
            echo "<p><strong> Type: </strong> " . htmlspecialchars($_POST["type_$i"]) . "</p>";
            echo "<p><strong> City: </strong> " . htmlspecialchars($_POST["city_$i"]) . "</p>";
            echo "<p><strong> Zip Code: </strong> " . htmlspecialchars($_POST["zipcode_$i"]) . "</p>";
            echo "<br>";
        }
        echo "</div>";
    }

    // Ferme la div avec la classe 'container'
    echo "</div>";
}
?>
