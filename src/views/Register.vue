<template>
    <div class="container">
      <h2>Регистрация</h2>
      <form @submit.prevent="register">
        <div class="mb-3">
          <label for="username" class="form-label">Имя пользователя</label>
          <input type="text" v-model="username" id="username" class="form-control">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" v-model="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Подтверждение пароля</label>
          <input type="password" v-model="confirmPassword" id="confirmPassword" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const username = ref("");
  const password = ref("");
  const confirmPassword = ref("");
  
  const register = () => {
    if (password.value !== confirmPassword.value) {
      alert("Пароли не совпадают");
      return;
    }
    alert(`Регистрация пользователя ${username.value} с паролем ${password.value}`);
  };
  </script>
  