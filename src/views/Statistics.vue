<template>
    <div class="container">
      <h2>Статистика</h2>
      <div class="row">
        <div class="col-md-4">
          <h5>Билеты</h5>
          <p>Продано: {{ ticketStats.totalSold }}</p>
          <p>Доход: {{ ticketStats.totalRevenue }}</p>
        </div>
        <div class="col-md-4">
          <h5>Аттракционы</h5>
          <p>Посещено: {{ attractionStats.totalVisited }}</p>
          <p>Доход: {{ attractionStats.totalRevenue }}</p>
        </div>
        <div class="col-md-4">
          <h5>Сувениры</h5>
          <p>Продано: {{ souvenirStats.totalSold }}</p>
          <p>Доход: {{ souvenirStats.totalRevenue }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { computed } from "vue";
  import { useStore } from "vuex";
  
  const store = useStore();
  const ticketStats = computed(() => store.state.ticketStats);
  const attractionStats = computed(() => store.state.attractionStats);
  const souvenirStats = computed(() => store.state.souvenirStats);
  
  store.dispatch("fetchTicketStats");
  store.dispatch("fetchAttractionStats");
  store.dispatch("fetchSouvenirStats");
  </script>
  