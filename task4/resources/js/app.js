require('./bootstrap');

import { createApp } from 'vue';

import component from './components/ExampleComponent.vue';
import componentnew from './components/questions.vue';

let app=createApp({})
app.component('example-component' , component);

app.mount("#app")

let appnew=createApp({})
appnew.component('example-componentnew' , componentnew);

appnew.mount("#appnew")
