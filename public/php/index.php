<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ''; $nombreBaseDatos = "proyectolaravel";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

// Listar Empleados
if (isset($_GET["consultar_empleados"])){
    $sqlEmpleados = mysqli_query($conexionBD,"SELECT * FROM empleados WHERE deleted_at IS NULL");
if(mysqli_num_rows($sqlEmpleados) > 0){
    $empleados = mysqli_fetch_all($sqlEmpleados,MYSQLI_ASSOC);
    echo json_encode($empleados);
}
else{ echo json_encode([["success"=>0]]); }
}

//Inserta un nuevo empleado
if(isset($_GET["insertar_empleado"])){
    $data = json_decode(file_get_contents("php://input"));
    $dni=$data->dni;
    $nombre_apellidos=$data->nombre_apellidos;
    $password=$data->password;
    $fecha_alta=$data->fecha_alta;
    $email=$data->email;
    $direccion=$data->direccion;
    $telefono=$data->telefono;
    $es_admin=$data->es_admin;
    
        if(($dni!="")&&($nombre_apellidos!="")&&($password!="")&&($fecha_alta!="")&&($email!="")&&($direccion!="")&&($telefono!="")&&($es_admin!="")){
            
    $sqlEmpleados = mysqli_query($conexionBD,"INSERT INTO empleados(dni,nombre_apellidos,password,fecha_alta,email,direccion,telefono,es_admin) 
    VALUES('$dni','$nombre_apellidos','$password','$fecha_alta','$email','$direccion','$telefono','$es_admin') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}