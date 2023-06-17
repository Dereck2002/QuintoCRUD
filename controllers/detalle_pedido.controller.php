<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/detalle_pedido.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$detalle_pedido = new detalle_pedidoModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $codigo_pedido->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_pedido = $_POST['codigo_pedido'];
        $datos = array();
        $datos = $codigo_pedido->uno($codigo_pedido);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $codigo_pedido = $_POST['codigo_pedido'];
        $codigo_producto = $_POST['codigo_producto'];
        $cantidad = $_POST['cantidad'];
        $precio_unidad = $_POST['precio_unitario'];
        $numero_linea = $_POST['extencion'];
        $datos = array();
        $datos = $detalle_pedido->Insertar($codigo_pedido, $codigo_producto,$cantidad, $precio_unidad, $numero_linea);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_pedido = $_POST['codigo_pedido'];
        $codigo_producto = $_POST['codigo_producto'];
        $cantidad = $_POST['cantidad'];
        $precio_unidad = $_POST['precio_unitario'];
        $numero_linea = $_POST['extencion'];
        $datos = array();
        $datos = $detalle_pedido->Actualizar($codigo_pedido, $codigo_producto,$cantidad, $precio_unidad, $numero_linea);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $codigo_pedido = $_POST['codigo_pedido'];
        $datos = array();
        $datos = $detalle_pedido->Eliminar($codigo_pedido);
        echo json_encode($datos);
        break;
}