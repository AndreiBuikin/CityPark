<!-- src/components/Header.vue -->
<template>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Парк Развлечений</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <router-link to="/" class="nav-link">Главная</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/attractions" class="nav-link">Аттракционы</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/tickets" class="nav-link">Билеты</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/souvenirs" class="nav-link">Сувениры</router-link>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <router-link to="/login" class="nav-link">Вход</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/register" class="nav-link">Регистрация</router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </template>
  
  <style scoped>
  .navbar {
    background-color: #e3f2fd;
  }
  </style>
  