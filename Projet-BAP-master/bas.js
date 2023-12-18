document.addEventListener('DOMContentLoaded', (event) => {
    let bas = document.querySelectorAll('.bas-vetement');
    let highlightedBas = document.getElementById('highlighted-bas');

    bas.forEach(bas => {
        bas.addEventListener('click', () => {
            // Insère l'image du haut cliqué dans la div `highlighted-haut`
            highlightedBas.innerHTML = '<img src="' + bas.src + '" alt="Bas sélectionné" class="bas-selected"/>';
        });
    });


    document.getElementById('linkSuivantBas').addEventListener('click', () => {
        const selectedBas = document.querySelector('.highlighted-bas img.bas-selected');
        if(selectedBas) {
          // Envoi de l'URL de l'image sélectionnée au serveur via AJAX
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'bas.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              // La requête est terminée, ici tu peux rediriger l'utilisateur si nécessaire
              window.location.href = 'accessoire.php'; // Redirige l'utilisateur vers hauts.php
            }
          };
          xhr.send('selectedBasUrl=' + encodeURIComponent(selectedBas.src));
        } else {
            alert('Veuillez sélectionner une mascotte.');
            console.log('Veuillez sélectionner une mascotte.');
        }
      });
    
});