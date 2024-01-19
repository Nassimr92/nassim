<script>
import { useJournalStore } from '@/stores/journal'
export default{
    name: 'CartePerso',
    setup(){
        const journalStore = useJournalStore()
        return{
          journalStore,
        }
    },
    computed:{
        calls(){
            return this.journalStore.callsText
        }
    },
    
}
</script>


<template>
    <div class="journal-single" v-for="call in calls">
      <h2>{{ call.nom }}</h2>
      <p>{{ call.date }}</p>
      <img src="../assets/appel-icon.png" alt="appel icon">
    </div>
</template>


<style scoped>
    /* Styles for individual journal entry layout */
.journal-single {
    display: flex; /* Utilisation d'un layout flexible */
    flex-direction: column; /* Empilement vertical des éléments */
}

/* Styles pour les titres de niveau 2 dans les entrées de journal */
.journal-single h2 {
    text-align: left; /* Alignement du texte à gauche */
    font-size: 20px; /* Taille de police */
    font-weight: 500; /* Poids de la police */
    color: black; /* Couleur du texte */
    letter-spacing: 1.04px; /* Espacement entre les lettres */
}

/* Styles pour les paragraphes dans les entrées de journal */
.journal-single p {
    font-size: 20px; /* Taille de police */
    font-weight: 500; /* Poids de la police */
    color: rgba(74, 73, 73, 0.797); /* Couleur du texte avec transparence */
    letter-spacing: 1.04px; /* Espacement entre les lettres */
}

/* Styles pour les images dans les entrées de journal */
.journal-single img {
    width: 5%; /* Largeur relative au conteneur parent */
    /* À ajuster selon le besoin pour une meilleure présentation */
}

</style>
