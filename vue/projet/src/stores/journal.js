import { defineStore } from "pinia";

export const useJournalStore = defineStore('phone', {
    state: () => ({
        callsText: [
            {
                nom: 'Nassim',
                date: "2024-01-01 00:00:01",
                number: '0779138362'
            },
            {
                nom: 'Jett',
                date: "2023-31-12 15:20:30",
                number: '06 46 67 23 66'
            },
            {
                nom: 'Nuketown',
                date: "2025-10-12 12:12:12",
                number: '06 46 67 23 12'
            },
            
        ],
    }),
    actions: {
        appel(contact) {
            this.callsText.push(contact);
        }
    }
});
