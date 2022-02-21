require('./bootstrap');

import { createApp } from 'vue';

import component from './components/ExampleComponent.vue';

let app=createApp({})
app.component('example-component' , component);

app.mount("#app")
