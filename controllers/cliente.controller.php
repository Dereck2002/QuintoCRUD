<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/ciente.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$cliente = new clienteModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $cliente->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = array();
        $datos = $cliente->uno($codigo_cliente);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $codigo_cliente = $_POST['Codigo_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
        $limite_credito = $_POST['limite_credito'];
        $datos = array();
        $datos = $cliente->Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_cliente = $_POST['Codigo_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
        $limite_credito = $_POST['limite_credito'];
        $datos = array();
        $datos = $cliente->Actualizar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = array();
        $datos = $cliente->Eliminar($codigo_cliente);
        echo json_encode($datos);
        break;
}