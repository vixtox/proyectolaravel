<template>
    <div class="container">

        <div class="card">
            <div class="card-header">Empleados</div>
            <div class="card-body">
                <table id="tabla-empleados" class="table table -striped table-bordered">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>DNI</th>
                            <th>Nombre y Apellidos</th>
                            <th>Fecha alta</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Es admin</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empleado in empleados" :key="empleado.id">
                            <td>{{ empleado.dni }}</td>
                            <td>{{ empleado.nombre_apellidos }}</td>
                            <td>{{ empleado.fecha_alta }}</td>
                            <td>{{ empleado.email }}</td>
                            <td>{{ empleado.telefono }}</td>
                            <td>{{ empleado.direccion }}</td>
                            <td>{{ empleado.es_admin }}</td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
  
<script>

export default {
  data() {
    return {
      empleados: [],
    };
  },

  created: function () {
    this.consultarEmpleados();
  },
  methods: {
    //
    consultarEmpleados() {
        fetch("/php/index.php?consultar_empleados")
        .then((respuesta) => respuesta.json())
        .then((datosRespuesta) => {
          console.log(datosRespuesta);
          this.empleados = [];
          if (typeof datosRespuesta[0].sucess === "undefined") {
            this.empleados = datosRespuesta;
          }

        })
        
        .catch(console.log);
    }

  }

}
</script>
