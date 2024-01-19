<script>
import contact from '../components/contact.vue'

  export default{
    name: 'ContactView',
    components:{
      contact,
    },
    methods:{
        adds(){
            window.location.href = "/addContact"
        }
    }
}
</script>

<template>
  <div class="contact-global-content">
    <button @click="adds()">Ajouter</button>
    <div class="contact-part">
      <contact />
    </div>
  </div>
</template>

<style scoped>
  .contact-global-content {
    position: relative;
    border: 3px solid #34db392a;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 40px;
  }

  .contact-part {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }


button {
  min-width: 100px;
  height: auto;
  background-color: #3498db;
  padding: 10px 20px;
  font-size: 24px;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
  background-color: #2980b9; 
  transform: scale(1.05); 
}
</style>

