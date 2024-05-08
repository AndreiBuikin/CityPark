<!-- src/App.vue -->
<template xmlns="http://www.w3.org/1999/html">
    <div id="app">
      <Header />

      <router-view />

      <Footer />
    </div>
  </template>
  
  <script setup>
  import Header from "@/components/Header.vue";
  import Footer from "@/components/Footer.vue";
  </script>
  
  <style>
  /* Add any global styles here */
  body {
    background-color: #f8f9fa;
  }

  </style>
  