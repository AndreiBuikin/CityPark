<template>
    <div class="container">
      <h1>Добро пожаловать в Парк Развлечений!</h1>
      <div class="row mt-3">
        <NewsCard v-for="news in newsList" :key="news.id" :news="news" />
      </div>
      <div class="row mt-3">
        <AttractionCard v-for="attraction in popularAttractions" :key="attraction.id" :attraction="attraction" />
      </div>
    </div>
  </template>
  
  <script setup>
  import { computed } from "vue";
  import { useStore } from "vuex";
  import NewsCard from "@/components/NewsCard.vue";
  import AttractionCard from "@/components/AttractionCard.vue";
  
  const store = useStore();
  const newsList = computed(() => store.state.news);
  const popularAttractions = computed(() => store.state.popularAttractions);
  
  store.dispatch("fetchNews");
  store.dispatch("fetchPopularAttractions");
  </script>
  
  <style>
  body {
    background-color: #f8f9fa;
  }
  </style>
  