import './bootstrap';

import { createApp } from 'vue';

import app from './components/ListarEmpleados.vue';
import app2 from './components/RegistroEmpleados.vue';

createApp (app).mount("#app");
createApp (app2).mount("#app2");
