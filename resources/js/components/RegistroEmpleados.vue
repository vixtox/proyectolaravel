<template>
    <div class="container">

        <div class="card">
            <div class="card-header">
                Alta empleado
            </div>
            <div class="card-body row">
                <form v-on:submit.prevent="agregarRegistro">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre"><b>Dni:</b></label>
                            <input type="text" class="form-control" required name="dni" v-model="empleado.dni" id="dni"
                                aria-describedby="helpId" placeholder="Dni">
                            <small id="helpId" class="form-text text-muted">Escribe el dni del empleado</small>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre_apellidos"><b>Nombre y apellidos:</b></label>
                            <input type="text" class="form-control" required name="nombre_apellidos"
                                v-model="empleado.nombre_apellidos" id="nombre_apellidos" aria-describedby="helpId"
                                placeholder="Nombre y apellidos">
                            <small id="helpId" class="form-text text-muted">Escribe el nombre y apellidos del
                                empleado</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password"><b>Password:</b></label>
                            <input type="password" class="form-control" required name="password" v-model="empleado.password"
                                id="password" aria-describedby="helpId" placeholder="password">
                            <small id="helpId" class="form-text text-muted">Escribe el código postal del
                                empleado</small>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_alta"><b>Fecha alta:</b></label>
                            <input type="date" class="form-control" required name="fecha_alta" v-model="empleado.fecha_alta"
                                id="fecha_alta" aria-describedby="helpId" placeholder="Fecha alta">
                            <small id="helpId" class="form-text text-muted">Escribela fecha de alta del
                                empleado</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email"><b>Email:</b></label>
                            <input type="email" class="form-control" required name="email" v-model="empleado.email"
                                id="email" aria-describedby="helpId" placeholder="Email">
                            <small id="helpId" class="form-text text-muted">Escribe el email del empleado</small>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion"><b>Dirección:</b></label>
                            <input type="text" class="form-control" required name="direccion" v-model="empleado.direccion"
                                id="direccion" aria-describedby="helpId" placeholder="Dirección">
                            <small id="helpId" class="form-text text-muted">Escribe la dirección del empleado</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="telefono"><b>Teléfono:</b></label>
                            <input type="text" class="form-control" required name="telefono" v-model="empleado.telefono"
                                id="telefono" aria-describedby="helpId" placeholder="Teléfono">
                            <small id="helpId" class="form-text text-muted">Escribe el teléfono del empleado</small>
                        </div>
                        <div class="col-md-6">
                            <label for="es_admin"><b>Es admin:</b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="admin" value="1"
                                    v-model="empleado.es_admin" required />
                                <label class="form-check-label" for="admin">Administrador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="operario" value="0"
                                    v-model="empleado.es_admin" required />
                                <label class="form-check-label" for="operario">Operario</label>
                            </div>
                            <p v-if="submitted && !empleado.es_admin" class="text-danger">Por favor seleccione una opción
                            </p>
                        </div>
                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-person-add"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>


<script>
import bcrypt from 'bcryptjs'

export default {
    data() {
        return {
            empleado: {
                dni: "",
                nombre_apellidos: "",
                password: "",
                fecha_alta: "",
                email: "",
                direccion: "",
                telefono: "",
                es_admin: "",

            },
            submitted: false,
        };
    },
    methods: {
        async agregarRegistro() {
            console.log(this.empleado)

            this.submitted = true
            if (!this.empleado.es_admin) {
                return;
            }
                    
            const salt = bcrypt.genSaltSync(10)
            this.empleado.password = bcrypt.hashSync(this.empleado.password, salt)

            const respuesta = await fetch("/php/index.php?insertar_empleado=1", {
                method: "POST",
                body: JSON.stringify(this.empleado),
                headers: {
                    "Content-Type": "application/json",
                },
            });

            const datosRespuesta = await respuesta.json();
            console.log(datosRespuesta);
            window.location.href = '/listaEmpleadosVue';
        },
    }
};
</script>