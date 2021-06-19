<template>
  <section>
    <article>404</article>
    <p>
      Lost? Go back to
      <router-link to="/">Home</router-link>
    </p>
  </section>
</template>

<script>
    export default {
        name: "404"
    }
</script>

<style scoped>
  section {
    width:  100vw;
    height: 100vh;
  }
  
  article {
    font-size:  7rem;
    text-align: center;
    margin-top: 37vh;
  }
  
  p {
    text-align: center;
  }
  
  a {
    text-decoration: none;
  }
</style>