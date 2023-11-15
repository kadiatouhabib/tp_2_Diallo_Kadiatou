<?php
// Fonction pour se connecter à la base de données
function connectToDatabase($server, $user, $password, $dbName) {
    $connection = mysqli_connect($server, $user, $password, $dbName);

    // Vérifier si la connexion a échoué
    if (mysqli_connect_error()) {
        die("Erreur de connexion " . mysqli_connect_error());
    }

    // Sélectionner la base de données
    mysqli_select_db($connection, $dbName);

    return $connection;
}

// Fonction pour préparer une déclaration SQL
function prepareStatement($connection, $query) {
    $stmt = mysqli_prepare($connection, $query);

    // Vérifier si la préparation a échoué
    if (!$stmt) {
        die("Erreur de préparation de la requête: " . mysqli_error($connection));
    }

    return $stmt;
}

// Fonction pour lier des paramètres à une déclaration SQL
function bindParameters($stmt, $types, ...$params) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

// Fonction pour exécuter une déclaration SQL
function executeStatement($stmt) {
    // Vérifier si l'exécution a échoué
    if (!mysqli_stmt_execute($stmt)) {
        die("Erreur d'exécution de la requête: " . mysqli_stmt_error($stmt));
    }
}

// Fonction pour fermer une déclaration SQL
function closeStatement($stmt) {
    mysqli_stmt_close($stmt);
}

// Fonction pour fermer une connexion à la base de données
function closeConnection($connection) {
    mysqli_close($connection);
}
?>
