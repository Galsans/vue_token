import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";


// import component
import App from "./components/App.vue";
import Dashboard from "./components/ExampleComponent.vue";

// import
import index from "./components/kategori/index.vue";
import add from "./components/kategori/add.vue";
import kategori from "./components/kategori/kategori.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: "/", component: Dashboard},

        {path: "/kategori", component: index},
        {path: "/kategori/create", component: add},
        {path: "/kategori/:id", component: kategori},
        {path: "/kategori/:id/edit", component: add},
    ]
})
const app = createApp(App);
app.use(router);
app.mount('#app');

// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

