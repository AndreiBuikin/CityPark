<template>
    <div class="container">
      <h2>Покупка билетов</h2>
      <form @submit.prevent="purchaseTicket">
        <div class="mb-3">
          <label for="duration" class="form-label">Продолжительность</label>
          <select v-model="duration" id="duration" class="form-select">
            <option value="3">3 часа</option>
            <option value="6">6 часов</option>
            <option value="9">9 часов</option>
            <option value="12">12 часов</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="startDate" class="form-label">Дата начала</label>
          <input type="date" v-model="startDate" id="startDate" class="form-control">
        </div>
        <div class="mb-3">
          <label for="endDate" class="form-label">Дата конца</label>
          <input type="date" v-model="endDate" id="endDate" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Купить</button>
      </form>
    </div>
  </template>

<style scoped>
.container {
  margin-bottom: 368px;
}
</style>

  <script setup>
  import { ref } from "vue";
  
  const duration = ref("3");
  const startDate = ref("");
  const endDate = ref("");
  
  const purchaseTicket = () => {
    alert(`Билет на ${duration.value} часа куплен с ${startDate.value} по ${endDate.value}`);
  };
  </script>
  