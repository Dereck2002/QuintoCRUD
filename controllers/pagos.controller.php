<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/pagos.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$producto = new PagosModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $pagos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = array();
        $datos = $pagos->uno($codigo_cliente);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $forma_pago = $_POST['nombres'];
        $id_transaccion = $_POST['gama'];
        $fecha_pago = $_POST['dimensiones'];
        $total = $_POST['proveedor'];
        $datos = array();
        $datos = $pagos->Insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $forma_pago = $_POST['nombres'];
        $id_transaccion = $_POST['gama'];
        $fecha_pago = $_POST['dimensiones'];
        $total = $_POST['proveedor'];
        $datos = array();
        $datos = $pagos->Actualizar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = array();
        $datos = $pagos->Eliminar($codigo_cliente);
        echo json_encode($datos);
        break;
}