<!-- App.vue -->

<template>
  <div id="app">
    <header>
      <nav>
        <RouterLink to="/">Journal</RouterLink>
        <RouterLink to="/contact">Contact</RouterLink>
        <RouterLink to="/clavier">Clavier</RouterLink>
      </nav>
    </header>
    <RouterView />
  </div>
</template>

<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>



<style>
body {
  background-color: white;
  margin: 0;
}

#app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

header {
  
  padding: 10px;
}

nav {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 10px;
}

nav a.router-link-exact-active {
  font-weight: bold;
}



nav a {
  text-decoration: none;
  color: black;
  font-size: 16px;
}

@media only screen and (max-width: 600px) {
  nav {
    flex-direction: column;
    align-items: center;
  }

  nav a {
    margin-bottom: 10px;
  }
}
</style>
