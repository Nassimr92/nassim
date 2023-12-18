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
<body class="bas">
    <div class="title-bas">
        <h1>Test BAP</h1>
        <p>Choisissez votre bas</p>
    </div>
    <div class="link-bas">
        <a href="hauts.php" class="retour-bas">Retour</a>
        <a href="accessoire.php" id="linkSuivantBas" class="suivant-bas">Suivant</a>
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
$sql = "SELECT url_bas FROM bas";
$result = $conn->query($sql);

$urls_bas = [];

if ($result->num_rows > 0) {
    // Stocker chaque URL dans le tableau $urls
    while($row = $result->fetch_assoc()) {
        array_push($urls_bas, $row["url_bas"]);
    }
} else {
    echo "0 résultats";
}
$conn->close();



if(isset($_POST['selectedBasUrl'])) {
    // Enregistre l'URL du haut sélectionné dans la session
    $_SESSION['selected_bas'] = $_POST['selectedBasUrl'];
    echo 'Le Bas a été enregistré avec succès';
    exit;
} 



?>
    
<div class="choix-bas">
<?php
// Vérifie si les images ont été définies dans la session
if(isset($_SESSION['selected_mascot']) && isset($_SESSION['selected_haut'])) {
    $selectedMascotUrl = $_SESSION['selected_mascot'];
    $selectedHautUrl = $_SESSION['selected_haut'];
?>
    <img src="<?php echo $selectedMascotUrl; ?>" alt="Mascotte sélectionnée" class="selected-mascot">
    <img src="<?php echo $selectedHautUrl; ?>" alt="Haut sélectionné" class="selected-haut">
    <div id="highlighted-bas" class="highlighted-bas">
        <!-- On fait apparaître les vêtements choisi ici -->
    </div>
<?php
} else {
    echo "Aucune mascotte sélectionnée.";
}
?>
<div class="boite-bas">
<?php
    // Afficher chaque image
    foreach ($urls_bas as $url_bas) {
        echo '<img src="' . $url_bas . '" alt="'.$url_bas.'" class="bas-vetement">';
    }
    ?>
</div>

</div>

<script src="bas.js"></script>
</body>
</html>