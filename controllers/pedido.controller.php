<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/pedido.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$producto = new pedidoModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $pedido->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_pedido = $_POST['codigo_pedido'];
        $datos = array();
        $datos = $pedido->uno($codigo_pedido);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $codigo_pedido = $_POST['codigo_pedidio'];
        $fecha_pedido = $_POST['fecha_pedido'];
        $fecha_esperada = $_POST['fecha_esperada'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $estado = $_POST['estadp'];
        $comentarios = $_POST['comentarios'];
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = array();
        $datos = $pedido->Insertar($fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_pedido = $_POST['codigo_pedidio'];
        $fecha_pedido = $_POST['fecha_pedido'];
        $fecha_esperada = $_POST['fecha_esperada'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $estado = $_POST['estadp'];
        $comentarios = $_POST['comentarios'];
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = array();
        $datos = $pedido->Actualizar($fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $codigo_pedido = $_POST['codigo_pedido'];
        $datos = array();
        $datos = $pedido->Eliminar($codigo_pedido);
        echo json_encode($datos);
        break;
}