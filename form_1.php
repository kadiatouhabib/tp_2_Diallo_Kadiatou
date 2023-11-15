<!--form_1.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form1.css">
    <title>formulaire 1 </title>
</head>
<body>
    
</body>
</html>
<a href="index.php">Retour </a>

<?php



// Vérifie si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupère le nombre d'adresses saisi
    $addressCount = isset($_POST["addressCount"]) ? intval($_POST["addressCount"]) : 0;

    // Vérifie si le nombre d'adresses est valide
    if ($addressCount <= 0) {
        echo "<p>Saisissez un nombre valide.</p>";
    } else {
        // Affiche le formulaire
        echo "<div class='container'>";
        echo "<h2>Veuillez remplir tous les champs </h2>";
        echo "<form action='result.php' method='post'>";

        // Boucle pour afficher les champs d'adresse en fonction du nombre saisi
        for ($i = 1; $i <= $addressCount; $i++) {
            echo "<div class='address-form'>";
            echo "<h2> Adresse $i</h2>";

            // Champ STREET
            echo "<label for='street_$i'>Street:</label>";
            echo "<input type='text' name='street_$i' maxlength='60' required><br>";
            echo "<br>";

            // Champ STREET_NB
            echo "<label for='street_nb_$i'>Street_nb:</label>";
            echo "<input type='number' name='street_nb_$i' required><br>";
            echo "<br>";

            // Champ TYPE
            echo "<label for='type_$i'>Type:</label>";
            echo "<select name='type_$i' required>";
            echo "<option value='Livraison'> Livraison </option>";
            echo "<option value='Facturation'> Facturation </option>";
            echo "<option value='Autres'> Autres </option>";
            echo "</select>";
            echo "<br>";

            // Champ CITY
            echo "<br><label for='city_$i'>City:</label>";
            echo "<select name='city_$i' required><br>";
            echo "<option value='Montreal'> Montreal </option>";
            echo "<option value='Laval'> Laval </option>";
            echo "<option value='Toronto'> Toronto </option>";
            echo "<option value='Quebec'> Quebec </option>";
            echo "</select>";
            echo "<br>";

            // Champ ZIP CODE
            echo "<br><label for='zipcode_$i'>Zip Code:</label>";
            echo "<input type='text' name='zipcode_$i' pattern='\w{6}' title='Six caracteres required' required><br>";
            echo "<br>";
            echo "</div>";
            echo "<br>";
        }

        // Ajout d'un champ caché pour stocker le nombre d'adresses
        echo "<input type='hidden' name='nombre_Adresse' value='$addressCount'><br>";
        echo "<br>";

        // Bouton de soumission du formulaire
        echo "<input type='submit' name='submit' value='Soumettre'>";
        echo "</form>";
        echo "<br>";
        echo "<br>";
        echo "</div>";
    }
}
?>
