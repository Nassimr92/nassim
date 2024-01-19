<script>
import journal from '../components/journal.vue'
  export default{
    name: 'JournalView',
    components:{
      journal,
    },
    
}
</script>

<template>
  <div class="journal-global-content">
    <journal />
  </div>
</template>

<style scoped>
.journal-global-content {
  border: 3px solid #34db392a;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
}



@media only screen and (max-width: 600px) {
  .journal-global-content {
    grid-template-columns: 1fr; 
  }
}

@media only screen and (min-width: 601px) and (max-width: 900px) {
  .journal-global-content {
    grid-template-columns: repeat(2, 1fr); 
  }
}
</style>