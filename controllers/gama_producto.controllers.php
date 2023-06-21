<?php
/*TODO: Requerimientos */

require_once("../models/gama_productos.model.php");
require_once('../models/subirFotos.model.php');
error_reporting(0);
$gama_producto = new gama_productosModel;
$subirfotos = new SubirFoto;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $gama_producto->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $gama = $_POST["gama"];
        $datos = array();
        $datos = $gama_producto->uno($gama);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $gama = $_POST["gama"];
        $descripcion_texto = $_POST["descripcion_texto"];
        $descripcion_html = $_POST["descripcion_html"];

        //procedimeinto para guardar la imagen en los archivos del proyecto
        if ($_FILES['imagen'] != '') {
            $imagen = $_FILES["imagen"];
            $direccionimg = $subirfotos->guardar($imagen);
            $imagen ='';
            $imagen = $direccionimg;
        } 
        //poner en una variable la ruta

        $datos = array();
        $datos = $gama_producto->Insertar($gama, $descripcion_texto, $descripcion_html, $direccionimg);
        echo json_encode($datos);



        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $gama = $_POST["gama"];
        $descripcion_texto = $_POST["descripcion_texto"];
        $descripcion_html = $_POST["descripcion_html"];
        $imagen = $_POST["imagen"];
        $datos = array();
        $datos = $gama_producto->Actualizar($gama, $descripcion_texto, $descripcion_html, $imagen);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $gama = $_POST["gama"];
        $datos = array();
        $datos = $gama_producto->Eliminar($gama);
        echo json_encode($datos);
        break;
}