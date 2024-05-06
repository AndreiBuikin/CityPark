<template>
    <div class="col-md-4 mb-3">
      <div class="card">
        <img :src="attraction.image" class="card-img-top" :alt="attraction.name">
        <div class="card-body">
          <h5 class="card-title">{{ attraction.name }}</h5>
          <p class="card-text">{{ attraction.description }}</p>
          <router-link :to="{ name: 'AttractionDetails', params: { id: attraction.id }}" class="btn btn-primary">Подробнее</router-link>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from "vue";
  
  const props = defineProps({
    attraction: Object
  });
  </script>
  
  <style scoped>
  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  </style>
  