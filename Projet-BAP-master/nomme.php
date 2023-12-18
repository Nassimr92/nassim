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
        <p>Nomme ta mascotte</p>
    </div>
    <div class="link-nom">
        <a href="accessoire.php" class="retour-nom">Retour</a>
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


?>
    
<div class="choix-nom">
<?php
// Vérifie si les images ont été définies dans la session
if(isset($_SESSION['selected_mascot']) && isset($_SESSION['selected_haut']) && isset($_SESSION['selected_bas']) && isset($_SESSION['selected_accessoire'])) {
    $selectedMascotUrl = $_SESSION['selected_mascot'];
    $selectedHautUrl = $_SESSION['selected_haut'];
    $selectedBasUrl = $_SESSION['selected_bas'];
    $selectedAccessoireUrl = $_SESSION['selected_accessoire'];
?>
    <div class="mascotte_rendu" id="mascotte_rendu">
        <img src="<?php echo $selectedMascotUrl; ?>" alt="Mascotte sélectionnée" class="selected-mascot">
        <img src="<?php echo $selectedHautUrl; ?>" alt="Haut sélectionné" class="selected-haut">
        <img src="<?php echo $selectedBasUrl; ?>" alt="Bas sélectionné" class="selected-bas">
        <img src="<?php echo $selectedAccessoireUrl; ?>" alt="Accessoire sélectionné" class="selected-accessoire">
    </div>
    
    
<?php


if (isset($_POST['image']) && isset($_POST['nom_mascotte'])) {
    // Récupère l'image et le nom de la mascotte du formulaire et les nettoie
    $nom_mascotte = $conn->real_escape_string($_POST['nom_mascotte']);
    $encoded_image = $_POST['image'];
    $decoded_image = base64_decode(preg_replace("#^data:image/\w+;base64,#i", '', $encoded_image));

    // Définir le chemin où sauvegarder l'image
    $filepath = "./images/rendu_mascotte/mascotte_" . uniqid() . ".png";

    // Sauvegarde l'image dans le fichier
    file_put_contents($filepath, $decoded_image);

    // Prépare la requête d'insertion pour ajouter à la fois le nom et le chemin de l'image
    $stmt = $conn->prepare("INSERT INTO galerie (name, rendu_mascotte) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom_mascotte, $filepath);

    // Exécute la requête
    if ($stmt->execute()) {
        echo "Le nom de la mascotte et le chemin de l'image ont été ajoutés avec succès dans la base de données!";
    } else {
        echo "Erreur lors de l'insertion: " . $stmt->error;
    }

    // Ferme la déclaration et la connexion
    $stmt->close();
    $conn->close();
} else {
    echo "";
}




} else {
    echo "Aucune mascotte sélectionnée.";
}


?>
<div class="input-nom">
    <form action="nomme.php" method="POST">
        <input type="text" name="nom_mascotte" id="nom_mascotte" placeholder="Donnes un nom à ta mascotte">
        <input type="submit" id="submit_button" placeholder="Rejoindre les autres mascottes !">
    </form>
</div>

</div>

<img src="" alt="">



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="nomme.js"></script>
</body>
</html>