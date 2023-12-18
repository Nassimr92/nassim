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
<body class="index">
    <h1>Test BAP</h1>
    <p>Voici les mascottes de l'entreprise :</p>
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



// Vérifie si une requête AJAX a été envoyée
if(isset($_POST['selectedMascotUrl'])) {
    // Stockage de l'URL de l'image sélectionnée dans la session
    $_SESSION['selected_mascot'] = $_POST['selectedMascotUrl'];
  
    // Retourne une réponse et termine le script pour éviter de charger le reste de la page HTML
    echo "Image enregistrée";
    exit;
  }


?>


<div id="highlighted-mascot" class="highlighted-mascot">
  <!-- L'image mise en avant sera affichée ici -->
</div>
<div class="carousel-container">
  <div id="carousel" class="carousel">
    <?php
    // Afficher chaque image
    foreach ($urls as $url) {
        echo '<img src="' . $url . '" alt="'.$url.'" class="mascotte">';
    }
    ?>
  </div>
  <div class="carousel-controls">
    <button id="prevButton"></button>
    <button id="nextButton"></button>
    <div>
        <a href="hauts.php" id="nextPage">Suivant</a>
    </div>
  </div>
</div>



<script src="script.js"></script>
</body>
</html>










