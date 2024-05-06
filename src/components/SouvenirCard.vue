<template>
    <div class="col-md-4 mb-3">
      <div class="card">
        <img :src="souvenir.image" class="card-img-top" :alt="souvenir.name">
        <div class="card-body">
          <h5 class="card-title">{{ souvenir.name }}</h5>
          <p class="card-text">{{ souvenir.description }}</p>
          <button class="btn btn-primary" @click="buySouvenir(souvenir.id)">Купить</button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from "vue";
  
  const props = defineProps({
    souvenir: Object
  });
  
  const buySouvenir = (id) => {
    alert(`Покупка сувенира ID ${id}`);
  };
  </script>
  
  <style scoped>
  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  </style>
  