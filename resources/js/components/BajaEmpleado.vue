<template>
    <div class="container">
        <div id="cabecera" class="d-flex align-items-center mb-3 pb-1 d-flex justify-content-center">
            <img src="https://www.axa.es/documents/1119421/1495220/axa_logo_solid_rgb.png/f8e5512b-5d0f-7246-85d1-74876d5c97c1?t=1518522617419"
                alt="" width="5%">
        </div>
        <div class="card">
            <div class="card-header">Cliente</div>
            <div class="card-body">
                <table id="tabla-cliente" class="table table -striped table-bordered">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Localidad</th>
                            <th>CP</th>
                            <th>Provincia</th>
                            <th>Entidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ cliente.nombre }}</td>
                            <td>{{ cliente.apellidos }}</td>
                            <td>{{ cliente.telefono }}</td>
                            <td>{{ cliente.localidad }}</td>
                            <td>{{ cliente.cp }}</td>
                            <td>{{ cliente.provincia_nombre }}</td>
                            <td>{{ cliente.entidad }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <h1>Confirme para borrar el cliente</h1>
        <div class="btn-group" aria-label="">
            <button type="button" title="Borrar" v-on:click="borrarCliente(cliente.id)" class="btn btn-danger"><i
                    class="bi bi-person-dash"></i></button>
            <router-link :to="{ name: 'ListarClientes' }" class="btn btn-warning" title="Volver">
                <i class="bi bi-arrow-return-left"></i>
            </router-link>
        </div>
    </div>
</template>

<script>

// import $ from "jquery";
import "datatables.net";

export default {
    data() {
        return {
            cliente: {
                nombre: "",
                apellidos: "",
                telefono: "",
                localidad: "",
                cp: "",
                provincia: "",
                entidad: "",
            },
        };
    },

    created: function () {
        this.obtenerInformacionID();
    },
    methods: {

        async obtenerInformacionID() {

            fetch("php/index.php?consultar_empleado=" + this.$route.params.id)
                .then((respuesta) => respuesta.json())
                .then((datosRespuesta) => {

                    console.log(datosRespuesta);
                    this.cliente = datosRespuesta[0];

                })
                .catch(console.log);

        },

        borrarEmpleado(id) {

            console.log(id)

            fetch("php/index.php?borrar_empleado=" + id)
                .then((respuesta) => respuesta.json())
                .then((datosRespuesta) => {

                    console.log(datosRespuesta);
                    // this.$router.push({ name: "ListarClientes" });
                    window.location.href = '/listaEmpleadosVue';
                })
                .catch(console.log);

        },

    }

}
</script>
