import { defineStore } from "pinia";

export const useAddContactStore = defineStore('personne', {
    state: () => ({
        personnes: [
            {
                nom: 'nassim',
                number: '07 79138362'
            },
            {
                nom: 'nuketown',
                number: '06 46 67 23 12'
            },
            {
                nom: 'jett',
                number: '07 20 11 89 44'
            },
            
        ],
    }),
    actions: {
        ajoutPersonne(personne) {
            this.personnes.push(personne);
        }
    }
});
