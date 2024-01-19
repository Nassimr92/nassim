// stores/clavier.js
import { defineStore } from "pinia";

export const useClavierStore = defineStore('clavier', {
  state: () => ({
    clavierText: "",
    errorMessage: ""
  }),
  actions: {
    incrementClavier(clavier) {
      if (this.clavierText.replace(/ /g, '').length < 10) {
        if (this.clavierText.replace(/ /g, '').length % 2 === 0 && this.clavierText.length > 0) {
          this.clavierText += " ";
        }
        this.clavierText += clavier;
      } else {
        this.errorMessage = "Le numéro doit être composé de 10 chiffres maximum.";
      }
    },
    resetClavier() {
      this.clavierText = "";
      this.errorMessage = "";
    },
    deleteLastDigit() {
      if (this.clavierText.length > 0) {
        this.clavierText = this.clavierText.slice(0, -1);
      }
    }
  }
});
