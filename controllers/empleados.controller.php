<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/empleados.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$empleado = new EmpleadoModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $codigo_empleado->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_empleado = $_POST['codigo_empleado'];
        $datos = array();
        $datos = $codigo_empleado->uno($codigo_empleado);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $codigo_empleado = $_POST['codigo_empleado'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $extension = $_POST['extencion'];
        $email = $_POST['email'];
        $codigo_oficina = $_POST['codigo_oficina'];
        $codigo_jefe = $_POST['codigo_jefe'];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $empleados->Insertar($nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_empleado = $_POST['codigo_empleado'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $extension = $_POST['extencion'];
        $email = $_POST['email'];
        $codigo_oficina = $_POST['codigo_oficina'];
        $codigo_jefe = $_POST['codigo_jefe'];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $empleados->Actualizar($nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $codigo_empleado = $_POST['gama'];
        $datos = array();
        $datos = $empleados->Eliminar($codigo_empleado);
        echo json_encode($datos);
        break;
}