<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test BAP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="nom">
    <div class="title-nom">
        <h1>Test BAP</h1>
        <p>galerie carsten</p>
    </div>
    <div class="link-nom">
        <a href="index.php" id="linkSuivantAccessoire" class="suivant-nom">Accueil</a>
    </div>
    
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

$sql = "SELECT name, rendu_mascotte FROM galerie";
$result = $conn->query($sql);

// Vérifier si la requête a retourné des résultats
if ($result->num_rows > 0) {
    // Parcourir les résultats et les afficher
    ?>
    <div class="expo-mascotte">
        <?php
    while($row = $result->fetch_assoc()) {
        ?>
            <div class="expo-solo">
            <?php
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<img src='" . $row["rendu_mascotte"] . "' alt='" . $row["name"] . "' class='image-rendu'>";
            ?>
            </div>
        <?php
    }
    ?>
    </div>
    <?php
} else {
    echo "0 résultats";
}

// Fermer la connexion
$conn->close();

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="nomme.js"></script>
</body>
</html>