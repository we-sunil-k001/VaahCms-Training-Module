import './assets/main.css'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import axios from 'axios'       // additionally installed package

const app = createApp(App)

axios.defaults.baseURL = 'http://localhost:8000'; // Adjust to your Laravel server's URL

app.use(createPinia())
app.use(router)

app.mount('#app')
