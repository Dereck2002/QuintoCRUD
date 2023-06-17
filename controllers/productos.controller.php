<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/productos.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$producto = new productosModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $productos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_producto = $_POST['codigo_producto'];
        $datos = array();
        $datos = $productos->uno($codigo_producto);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $codigo_producto = $_POST['codigo_producto'];
        $nombres = $_POST['nombres'];
        $gama = $_POST['gama'];
        $dimensiones = $_POST['dimensiones'];
        $proveedor = $_POST['proveedor'];
        $descripcion = $_POST['descripcion'];
        $cantidad_en_stock = $_POST['cantidad_en_stock'];
        $precio_venta = $_POST['precio_venta'];
        $precio_proveedo = $_POST['precio_proveedo'];
        $datos = array();
        $datos = $productos->Insertar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $codigo_producto = $_POST['codigo_producto'];
        $nombres = $_POST['nombres'];
        $gama = $_POST['gama'];
        $dimensiones = $_POST['dimensiones'];
        $proveedor = $_POST['proveedor'];
        $descripcion = $_POST['descripcion'];
        $cantidad_en_stock = $_POST['cantidad_en_stock'];
        $precio_venta = $_POST['precio_venta'];
        $precio_proveedo = $_POST['precio_proveedo'];
        $datos = array();
        $datos = $productos->Actualizar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $codigo_producto = $_POST['codigo_producto'];
        $datos = array();
        $datos = $productos->Eliminar($codigo_producto);
        echo json_encode($datos);
        break;
}