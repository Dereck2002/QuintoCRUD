<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/empleado.models.php");
error_reporting(0);

$empleado = new EmpleadoModel;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $empleado->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_empleado = $_POST["codigo_empleado"];
        $datos = array();
        $datos = $empleado->uno($codigo_empleado);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_empleado = $_POST["codigo_empleado"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $extension = $_POST["extension"];
        $email = $_POST["email"];
        $codigo_oficina = $_POST["codigo_oficina"];
        $codigo_jefe = $_POST["codigo_jefe"];
        $puesto = $_POST["puesto"];

        $datos = array();
        $datos = $empleado->Insertar($codigo_empleado, $nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $codigo_empleado = $_POST["codigo_empleado"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $extension = $_POST["extension"];
        $email = $_POST["email"];
        $codigo_oficina = $_POST["codigo_oficina"];
        $codigo_jefe = $_POST["codigo_jefe"];
        $puesto = $_POST["puesto"];
        $datos = array();
        $datos = $empleado->Actualizar($codigo_empleado, $nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $codigo_empleado = $_POST["codigo_empleado"];
        $datos = array();
        $datos = $empleado->Eliminar($codigo_empleado);
        echo json_encode($datos);
        break;
}
