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
<body class="accessoire">
    <div class="title-accessoire">
        <h1>Test BAP</h1>
        <p>Choisissez votre accessoire</p>
    </div>
    <div class="link-accessoire">
        <a href="bas.php" class="retour-accessoire">Retour</a>
        <a href="nomme.php" id="linkSuivantAccessoire" class="suivant-accessoire">Suivant</a>
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
$sql = "SELECT url_accessoire FROM accessoire";
$result = $conn->query($sql);

$urls_accessoire = [];

if ($result->num_rows > 0) {
    // Stocker chaque URL dans le tableau $urls
    while($row = $result->fetch_assoc()) {
        array_push($urls_accessoire, $row["url_accessoire"]);
    }
} else {
    echo "0 résultats";
}
$conn->close();



if(isset($_POST['selectedAccessoireUrl'])) {
    // Enregistre l'URL du haut sélectionné dans la session
    $_SESSION['selected_accessoire'] = $_POST['selectedAccessoireUrl'];
    echo 'L accessoire a été enregistré avec succès';
    exit;
} 
?>  
<div class="choix-accessoire">
<?php
// Vérifie si les images ont été définies dans la session
if(isset($_SESSION['selected_mascot']) && isset($_SESSION['selected_haut']) && isset($_SESSION['selected_bas'])) {
    $selectedMascotUrl = $_SESSION['selected_mascot'];
    $selectedHautUrl = $_SESSION['selected_haut'];
    $selectedBasUrl = $_SESSION['selected_bas'];  
?>
    <img src="<?php echo $selectedMascotUrl; ?>" alt="Mascotte sélectionnée" class="selected-mascot">
    <img src="<?php echo $selectedHautUrl; ?>" alt="Haut sélectionné" class="selected-haut">
    <img src="<?php echo $selectedBasUrl; ?>" alt="Bas sélectionné" class="selected-bas">
    <div id="highlighted-accessoire" class="highlighted-accessoire">
        <!-- On fait apparaître les vêtements choisi ici -->
    </div>
<?php
} else {
    echo "Aucune mascotte sélectionnée.";
}
?>
<div class="boite-accessoire">
<?php
    // Afficher chaque image
    foreach ($urls_accessoire as $url_accessoire) {
        echo '<img src="' . $url_accessoire . '" alt="'.$url_accessoire.'" class="accessoire-vetement">';
    }
    ?>
</div>
</div>
<script src="accessoire.js"></script>
</body>
</html>