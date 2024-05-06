// src/store/index.js
import { createStore } from "vuex";
import axios from "axios";
import moment from "moment";

export default createStore({
  state: {
    user: null,
    news: [],
    attractions: [],
    souvenirs: [],
    tickets: []
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
    },
    setNews(state, news) {
      state.news = news;
    },
    setAttractions(state, attractions) {
      state.attractions = attractions;
    },
    setSouvenirs(state, souvenirs) {
      state.souvenirs = souvenirs;
    },
    setTickets(state, tickets) {
      state.tickets = tickets;
    }
  },
  actions: {
    async fetchNews({ commit }) {
      const response = await axios.get("/api/news");
      commit("setNews", response.data);
    },
    async fetchAttractions({ commit }) {
      const response = await axios.get("/api/attractions");
      commit("setAttractions", response.data);
    },
    async fetchSouvenirs({ commit }) {
      const response = await axios.get("/api/souvenirs");
      commit("setSouvenirs", response.data);
    },
    async fetchTickets({ commit }) {
      const response = await axios.get("/api/tickets");
      commit("setTickets", response.data);
    }
  }
});
