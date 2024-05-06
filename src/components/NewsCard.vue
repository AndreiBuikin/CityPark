<template>
    <div class="col-md-4 mb-3">
      <div class="card">
        <img :src="news.image" class="card-img-top" :alt="news.title">
        <div class="card-body">
          <h5 class="card-title">{{ news.title }}</h5>
          <p class="card-text">{{ news.description }}</p>
          <router-link :to="{ name: 'Home', params: { id: news.id }}" class="btn btn-primary">Подробнее</router-link>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from "vue";
  
  const props = defineProps({
    news: Object
  });
  </script>
  
  <style scoped>
  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  </style>
  