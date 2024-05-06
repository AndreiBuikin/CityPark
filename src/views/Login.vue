<template>
    <div class="container">
      <h2>Вход в систему</h2>
      <form @submit.prevent="login">
        <div class="mb-3">
          <label for="username" class="form-label">Имя пользователя</label>
          <input type="text" v-model="username" id="username" class="form-control">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" v-model="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const username = ref("");
  const password = ref("");
  
  const login = () => {
    alert(`Вход пользователя ${username.value} с паролем ${password.value}`);
  };
  </script>
  