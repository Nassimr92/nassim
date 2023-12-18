document.addEventListener('DOMContentLoaded', (event) => {
    const carousel = document.getElementById('carousel');
    const highlightedMascot = document.getElementById('highlighted-mascot');
    let images = carousel.getElementsByTagName('img');
  
    // Afficher la première image en grand au chargement
    if(images.length > 0) {
      highlightImage(images[0]);
    }
  
    // Mettre en évidence une image
    function highlightImage(image) {
      for(let img of images) {
        img.classList.remove('selected');
      }
      image.classList.add('selected');
      highlightedMascot.innerHTML = `<img src="${image.src}" alt="${image.alt}" />`;
    }
  
    // Écouteurs d'événements pour les boutons
    document.getElementById('prevButton').addEventListener('click', () => {
      carousel.scrollBy({ left: -carousel.offsetWidth, behavior: 'smooth' });
      updateHighlightedMascot();
    });
  
    document.getElementById('nextButton').addEventListener('click', () => {
      carousel.scrollBy({ left: carousel.offsetWidth, behavior: 'smooth' });
      updateHighlightedMascot();
    });
  
    // Fonction pour mettre à jour l'image mise en évidence
    function updateHighlightedMascot() {
      let centerPosition = carousel.scrollLeft + carousel.offsetWidth / 2;
      let closest = null;
      let closestDist = Infinity;
  
      for (let img of images) {
        let box = img.getBoundingClientRect();
        let dist = Math.abs(box.left + box.width / 2 - centerPosition);
        
        if (dist < closestDist) {
          closestDist = dist;
          closest = img;
        }
      }
  
      if (closest) {
        highlightImage(closest);
      }
    }
  
    // Ajouter un écouteur d'événements pour le défilement du carrousel
    carousel.addEventListener('scroll', () => {
      // Debouncing pour ne pas appeler la fonction trop souvent pendant le scroll
      clearTimeout(carousel.scrollTimeout);
      carousel.scrollTimeout = setTimeout(updateHighlightedMascot, 150);
    });
  
    // Ajouter un écouteur d'événements pour chaque image dans le carrousel
    for(let img of images) {
      img.addEventListener('click', () => highlightImage(img));
    }


    document.getElementById('nextPage').addEventListener('click', () => {
        const selectedMascotImg = document.querySelector('.carousel img.selected');
        if(selectedMascotImg) {
          // Envoi de l'URL de l'image sélectionnée au serveur via AJAX
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'index.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              // La requête est terminée, ici tu peux rediriger l'utilisateur si nécessaire
              window.location.href = 'hauts.php'; // Redirige l'utilisateur vers hauts.php
            }
          };
          xhr.send('selectedMascotUrl=' + encodeURIComponent(selectedMascotImg.src));
        } else {
            alert('Veuillez sélectionner une mascotte.');
            console.log('Veuillez sélectionner une mascotte.');
        }
      });
  });
  