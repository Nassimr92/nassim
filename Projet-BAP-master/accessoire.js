document.addEventListener('DOMContentLoaded', (event) => {
    let accessoire = document.querySelectorAll('.accessoire-vetement');
    let highlightedAccessoire = document.getElementById('highlighted-accessoire');

    accessoire.forEach(accessoire => {
        accessoire.addEventListener('click', () => {
            // Insère l'image du haut cliqué dans la div `highlighted-haut`
            highlightedAccessoire.innerHTML = '<img src="' + accessoire.src + '" alt="Accessoire sélectionné" class="accessoire-selected"/>';
        });
    });


    document.getElementById('linkSuivantAccessoire').addEventListener('click', () => {
        const selectedAccessoire = document.querySelector('.highlighted-accessoire img.accessoire-selected');
        if(selectedAccessoire) {
          // Envoi de l'URL de l'image sélectionnée au serveur via AJAX
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'accessoire.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              // La requête est terminée, ici tu peux rediriger l'utilisateur si nécessaire
              window.location.href = 'nomme.php'; // Redirige l'utilisateur vers hauts.php
            }
          };
          xhr.send('selectedAccessoireUrl=' + encodeURIComponent(selectedAccessoire.src));
        } else {
            alert('Veuillez sélectionner une mascotte.');
            console.log('Veuillez sélectionner une mascotte.');
        }
      });
});
