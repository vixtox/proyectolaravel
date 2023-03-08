import './bootstrap';

import { createApp } from 'vue';

import ListarEmpleados from './components/ListarEmpleados.vue';
import RegistroEmpleados from './components/RegistroEmpleados.vue';

createApp (ListarEmpleados).mount("#listarempleados");
createApp (RegistroEmpleados).mount("#registroempleados");
