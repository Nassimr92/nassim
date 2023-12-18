<?php
$servername = "localhost"; // L'adresse du serveur, généralement localhost
$username = "root"; // Votre nom d'utilisateur pour phpMyAdmin
$password = ""; // Votre mot de passe pour phpMyAdmin
$dbname = "testbap"; // Le nom de votre base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Requête pour obtenir les URLs
$sql = "SELECT url_mascotte FROM mascotte";
$result = $conn->query($sql);

$urls = [];

if ($result->num_rows > 0) {
    // Stocker chaque URL dans le tableau $urls
    while($row = $result->fetch_assoc()) {
        array_push($urls, $row["url_mascotte"]);
    }
} else {
    echo "0 résultats";
}
$conn->close();




?>

