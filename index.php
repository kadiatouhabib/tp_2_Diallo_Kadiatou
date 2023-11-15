<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Formulaire d'adresse</title>
</head>
<body>
    <div class="container">
        <h1>Combien d'adresses avez-vous ? </h1>
        <form action="form_1.php" method="post">
            <label for="addressCount">Saisir le nombre ici: </label>
            <input type="number" name="addressCount" required>
            <input type="submit" values="Submit">
        </form>
    </div>
</body>
</html>
