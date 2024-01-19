<script>
import { useAddContactStore } from '@/stores/addContact'

export default {
  name: 'addcontact',
  setup() {
    const personneStore = useAddContactStore()

    return {
      personneStore,
      perso: {
        nom: '',
        number: ''
      },
    }
  },
  methods: {
    ajoutPerso() {
      // Validation pour s'assurer que le numéro commence par "06" ou "07"
      if (!/^07\d{8}$|^06\d{8}$/.test(this.perso.number)) {
        alert("Le numéro doit commencer par 06 ou 07 et avoir 10 chiffres.");
        return;
      }

      this.personneStore.ajoutPersonne(this.perso);
      this.perso = {
        nom: '',
        number: ''
      };
    }
  }
}
</script>

<template>
  <div class="addContact-global-content">
    <form @submit.prevent="ajoutPerso()">
      <div class="adding">
        <h2>Nom</h2>
        <input type="text" v-model="perso.nom">
      </div>
      <div class="adding">
        <h2>Numéro</h2>
        <input type="text" v-model="perso.number">
      </div>
      <button type="submit">Ajouter</button>
    </form>
  </div>
</template>

<style scoped>
  /* Main container style for adding new contacts */
.addContact-global-content {
    border: 3px solid #34db392a; /* Solid border with a specific color */
    display: grid; /* Grid layout for the container */
    grid-template-rows: repeat(3, auto); /* Rows adapt to content size */
    gap: 20px; /* Space between grid items */
    padding: 20px; /* Padding inside the container */
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
}

/* Style for the adding contact form */
.adding {
    display: flex; /* Flexible box layout */
    flex-direction: column; /* Stack elements vertically */
    width: 100%; /* Full width of the parent element */
    max-width: 400px; /* Maximum width */
}

/* Styles for headings in the contact form */
.addContact-global-content h2 {
    font-size: 18px; /* Font size */
    margin-bottom: 5px; /* Space below the heading */
}

/* Styles for input fields in the contact form */
.addContact-global-content input {
    padding: 10px; /* Padding inside the input field */
    margin-bottom: 15px; /* Space below the input field */
    border: 2px solid #3498db; /* Border color */
    width: 100%; /* Full width of the parent element */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
}

/* Styles for buttons in the contact form */
.addContact-global-content button {
    border: none; /* No border */
    background-color: green; /* Background color */
    color: black; /* Text color */
    font-size: 18px; /* Font size */
    padding: 12px 24px; /* Padding inside the button */
    cursor: pointer; /* Cursor changes to pointer on hover */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for background and color */
}

/* Hover effect for buttons */
.addContact-global-content button:hover {
    background-color: #2980b9; /* Darker shade of background color on hover */
    color: black; /* Text color on hover */
}

</style>

