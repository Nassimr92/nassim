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
<body class="hauts">
    <div class="title-hauts">
        <h1>Test BAP</h1>
        <p>Choisissez votre hauts</p>
    </div>
    <div class="link-hauts">
        <a href="index.php" class="retour-haut">Retour</a>
        <a href="bas.php" id="linkSuivant">Suivant</a>
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


// Requête pour obtenir les URLs
$sql = "SELECT url_hauts FROM hauts";
$result = $conn->query($sql);

$urls_hauts = [];

if ($result->num_rows > 0) {
    // Stocker chaque URL dans le tableau $urls
    while($row = $result->fetch_assoc()) {
        array_push($urls_hauts, $row["url_hauts"]);
    }
} else {
    echo "0 résultats";
}
$conn->close();


if(isset($_POST['selectedHautUrl'])) {
    // Enregistre l'URL du haut sélectionné dans la session
    $_SESSION['selected_haut'] = $_POST['selectedHautUrl'];
    echo 'Le haut a été enregistré avec succès';
    exit;
} 

?>
    
<div class="choix-hauts">
<?php
// Vérifie si l'image a été définie dans la session
if(isset($_SESSION['selected_mascot'])) {
    $selectedMascotUrl = $_SESSION['selected_mascot'];
?>
    <img src="<?php echo $selectedMascotUrl; ?>" alt="Mascotte sélectionnée" class="selected-mascot">
    <div id="highlighted-haut" class="highlighted-haut">
        <!-- On fait apparaître les vêtements choisi ici -->
    </div>
<?php
} else {
    echo "Aucune mascotte sélectionnée.";
    var_dump($_SESSION);
}
?>
<div class="boite-haut">
<?php
    // Afficher chaque image
    foreach ($urls_hauts as $url_haut) {
        echo '<img src="' . $url_haut . '" alt="'.$url_haut.'" class="haut-vetement">';
    }
    ?>
</div>

</div>

<script src="haut.js"></script>
</body>
</html>