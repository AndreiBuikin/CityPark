<template>
    <div class="container">
      <h2>Сувениры</h2>
      <div class="row">
        <SouvenirCard v-for="souvenir in souvenirs" :key="souvenir.id" :souvenir="souvenir" />
      </div>
    </div>
  </template>
  
  <script setup>
  import { computed } from "vue";
  import { useStore } from "vuex";
  import SouvenirCard from "@/components/SouvenirCard.vue";
  
  const store = useStore();
  const souvenirs = computed(() => store.state.souvenirs);
  
  store.dispatch("fetchSouvenirs");
  </script>
  