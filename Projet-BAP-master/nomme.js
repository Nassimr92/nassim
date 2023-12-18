document.getElementById('submit_button').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche la soumission normale du formulaire

    var nomMascotte = document.getElementById('nom_mascotte').value; // Assurez-vous que l'ID est correct
    html2canvas(document.getElementById('mascotte_rendu')).then(canvas => {
        var image = canvas.toDataURL('image/png');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'nomme.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('nom_mascotte=' + encodeURIComponent(nomMascotte) + '&image=' + encodeURIComponent(image));

        xhr.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                // Succès ! La requête a réussi et la réponse se trouve dans this.responseText
                console.log(this.responseText); // Affiche la réponse du serveur dans la console
                window.location.href = "galerie.php"; // Redirige uniquement après une réponse réussie
            } else {
                // Nous avons atteint notre serveur cible, mais il a retourné une erreur
                console.error('Le serveur a retourné une erreur : ' + this.status);
            }
        };

        xhr.onerror = function() {
            // Il y a eu une erreur de connexion d'une sorte ou d'une autre
            console.error('Quelque chose s est mal passé pendant la requête AJAX.');
        };
    });
});


