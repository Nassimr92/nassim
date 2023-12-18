document.addEventListener('DOMContentLoaded', (event) => {
    let hauts = document.querySelectorAll('.haut-vetement');
    let highlightedHaut = document.getElementById('highlighted-haut');

    hauts.forEach(haut => {
        haut.addEventListener('click', () => {
            // Insère l'image du haut cliqué dans la div `highlighted-haut`
            highlightedHaut.innerHTML = '<img src="' + haut.src + '" alt="Haut sélectionné" class="haut-selected"/>';
        });
    });


    document.getElementById('linkSuivant').addEventListener('click', () => {
        const selectedHaut = document.querySelector('.highlighted-haut img.haut-selected');
        if(selectedHaut) {
          // Envoi de l'URL de l'image sélectionnée au serveur via AJAX
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'hauts.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              // La requête est terminée, ici tu peux rediriger l'utilisateur si nécessaire
              window.location.href = 'bas.php'; // Redirige l'utilisateur vers hauts.php
            }
          };
          xhr.send('selectedHautUrl=' + encodeURIComponent(selectedHaut.src));
        } else {
            alert('Veuillez sélectionner une mascotte.');
            console.log('Veuillez sélectionner une mascotte.');
        }
      });
    
});
